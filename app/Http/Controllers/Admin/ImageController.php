<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::latest()->paginate(10); // Lấy danh sách tin tức mới nhất, phân trang 10 mục/trang
        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
     {
        $users = User::all();
        $categories = Category::where('module', 'image')->get();
        return view('admin.images.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'group' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);
        $imagePath = null;
        try {
            $imagePath = $request->file('image')->store('public/images');
            // dump("Image path saved: " . $imagePath);
        } catch (\Exception $e) {
            dd("Error saving image:", $e->getMessage());
        }

        $image = new Image();
        $image->title = $request->input('title');
        $image->path = $imagePath;
        $image->alt_text = $request->input('alt_text');
        $image->description = $request->input('description');
        $image->group = $request->input('group');
        $image->order = $request->input('order');
        $image->active = $request->input('active') ? true : false; // Chuyển đổi 'on'/'off' sang boolean
        $image->user_id = $request->user_id ?? auth()->id(); 

        try {
            $saved = $image->save();
            // dump("Image saved successfully: " . ($saved ? 'true' : 'false'));
        } catch (\Exception $e) {
            dd("Error saving to database:", $e->getMessage());
        }

        return redirect()->route('admin.images.index')->with('success', 'Ảnh đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::findOrFail($id);
        $users = User::all();
        $categories = Category::where('module', 'image')->get();
        return view('admin.images.edit', compact('image', 'users', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $image = Image::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable' vì không bắt buộc cập nhật ảnh
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'group' => 'nullable|string',
            'order' => 'nullable|integer',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $image->title = $request->input('title');
        $image->alt_text = $request->input('alt_text');
        $image->description = $request->input('description');
        $image->group = $request->input('group');
        $image->order = $request->input('order');
        $image->active = $request->input('active') ? true : false;
        $image->user_id = $request->input('user_id');

        // Xử lý việc cập nhật ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
            }
            $image->path = $request->file('image')->store('public/images');
        }

        $image->save();

        return redirect()->route('admin.images.index')->with('success', 'Ảnh đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);

        // Xóa file ảnh liên quan
        if ($image->path) {
            Storage::disk('public')->delete($image->path);
        }

        $image->delete();

        return redirect()->route('admin.images.index')->with('success', 'Ảnh đã được xóa thành công.');
    }
}