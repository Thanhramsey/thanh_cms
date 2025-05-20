<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Category;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newsTypes = Category::where('module', 'news')->where('active', 1)->get();
        return view('admin.news.create', compact('newsTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:news,slug|max:255',
            'summary' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'nullable|exists:users,id',
            'type_id' => 'nullable|exists:categories,id',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/news');
        }

        $news = new News();
        $news->title = $request->title;
        $news->slug = $slug;
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->image = $imagePath;
        $news->type_id = $request->type_id;
        $news->is_published = $request->is_published ? true : false;
        $news->published_at = $request->is_published ? now() : null;
        $news->user_id = $request->user_id ?? auth()->id(); // Lấy ID người dùng hiện tại nếu không được cung cấp
        $news->save();

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $newsTypes = Category::where('module', 'news')->where('active', 1)->get();
        return view('admin.news.edit', compact('news', 'newsTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:news,slug,' . $news->id . '|max:255',
            'summary' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'nullable|exists:users,id',
            'type_id' => 'nullable|exists:categories,id',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }
            $imagePath = $request->file('image')->store('public/news');
            $news->image = $imagePath;
        }

        $news->title = $request->title;
        $news->slug = $slug;
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->type_id = $request->type_id;
        $news->is_published = $request->is_published ? true : false;
        $news->published_at = $request->is_published ? now() : null;
        $news->user_id = $request->user_id ?? auth()->id(); // Lấy ID người dùng hiện tại nếu không được cung cấp
        $news->save();

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // 1. Xóa ảnh (nếu có)
        if ($news->image) {
            Storage::delete($news->image);
        }

        // 2. Xóa tin tức
        $news->delete();

        // 3. Chuyển hướng và hiển thị thông báo thành công
        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được xóa thành công.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension(); // Tạo tên file duy nhất
            $path = $image->storeAs('public/news/images', $filename); // Thử cách này

            return response()->json(['location' => asset('storage/' . $path)]); // Trả về URL của hình ảnh
        }

        return response()->json(['error' => 'Không thể tải lên hình ảnh.'], 400);
    }
    public function uploadMedia(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Tạo tên file duy nhất để tránh ghi đè
            $filename = uniqid() . '_' . time() . '_' . $file->getClientOriginalName();

            // Lưu vào storage/app/public/media.
            // Bạn có thể muốn tạo các thư mục con dựa trên loại file nếu cần
            // Ví dụ: $subFolder = $this->getSubfolderForFileType($file->getClientMimeType());
            // $path = $file->storeAs('public/media/' . $subFolder, $filename);
            $path = $file->storeAs('public/news/media', $filename);

            // Trả về URL công khai của file
            return response()->json(['location' => asset('storage/' . $path)]); // Trả về URL của hình ảnh
        }
        // Thêm kiểm tra lỗi và thông báo rõ ràng hơn
        if ($request->file('file') && !$request->file('file')->isValid()) {
            return response()->json(['error' => 'Uploaded file is not valid. Error: ' . $request->file('file')->getError()], 400);
        }
        return response()->json(['error' => 'No file uploaded or file upload error.'], 400);
    }
}