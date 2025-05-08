<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10); // Lấy danh sách tin tức mới nhất, phân trang 10 mục/trang
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:news,slug|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Tối đa 2MB
        ]);

        // 2. Tạo slug (nếu không được cung cấp)
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

        // 3. Xử lý file upload (nếu có)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/news'); // Lưu vào storage/app/public/news
        }

        // 4. Tạo tin tức mới
        $news = new News();
        $news->title = $request->title;
        $news->slug = $slug;
        $news->content = $request->content;
        $news->image = $imagePath;
        $news->is_published = $request->is_published ? true : false;
        $news->published_at = $request->is_published ? now() : null;
        $news->save();

        // 5. Chuyển hướng và hiển thị thông báo thành công
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
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // Xử lý việc cập nhật tin tức
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Xử lý việc xóa tin tức
    }
}