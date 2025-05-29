<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::latest()->paginate(10);
        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $linkData = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('links', 'public');
            $linkData['image'] = $imagePath;
        }

        Link::create($linkData);

        return redirect()->route('admin.links.index')->with('success', 'Liên kết đã được tạo.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $linkData = $request->except('image');

        if ($request->hasFile('image')) {
            if ($link->image) {
                Storage::disk('public')->delete($link->image);
            }
            $imagePath = $request->file('image')->store('links', 'public');
            $linkData['image'] = $imagePath;
        }

        $link->update($linkData);

        return redirect()->route('admin.links.index')->with('success', 'Liên kết đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if ($link->image) {
            Storage::disk('public')->delete($link->image);
        }
        $link->delete();
        return redirect()->route('admin.links.index')->with('success', 'Liên kết đã được xóa.');
    }
}