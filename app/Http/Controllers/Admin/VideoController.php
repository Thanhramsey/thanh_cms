<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade for string operations

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Video::query();

        if ($request->has('title') && $request->title != '') {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->has('is_published') && $request->is_published != '') {
            $query->where('is_published', $request->is_published);
        }

        $videos = $query->orderBy('order', 'asc')->paginate(10)->withQueryString();

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:mp4,webm,ogg|max:51200', // Max 50MB (51200 KB)
            'embed_url' => 'nullable|url|max:255', // Validates as URL
            'is_published' => 'boolean',
            'order' => 'nullable|integer',
        ], [
            'video_file.max' => 'Kích thước file video không được vượt quá 50MB.',
            'video_file.mimes' => 'Chỉ chấp nhận các định dạng video mp4, webm, ogg.',
            'embed_url.url' => 'URL nhúng không hợp lệ.'
        ]);

        $videoData = $request->except(['video_file']);
        $videoData['is_published'] = $request->has('is_published');

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            $filePath = $request->file('video_file')->store('videos', 'public');
            $videoData['video_path'] = $filePath;
            $videoData['embed_url'] = null; // Clear embed URL if local file is uploaded
        } else if ($request->has('embed_url')) {
            $videoData['video_path'] = null; // Clear local path if embed URL is provided
        }


        Video::create($videoData);

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        // For admin panel, we might not need a separate show page, but can be implemented if required.
        // Usually, edit page serves the purpose of viewing details in admin.
        return redirect()->route('admin.videos.edit', $video->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:mp4,webm,ogg|max:51200',
            'embed_url' => 'nullable|url|max:255',
            'is_published' => 'boolean',
            'order' => 'nullable|integer',
        ], [
            'video_file.max' => 'Kích thước file video không được vượt quá 50MB.',
            'video_file.mimes' => 'Chỉ chấp nhận các định dạng video mp4, webm, ogg.',
            'embed_url.url' => 'URL nhúng không hợp lệ.'
        ]);

        $videoData = $request->except(['video_file']);
        $videoData['is_published'] = $request->has('is_published');

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            // Delete old file if exists
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $filePath = $request->file('video_file')->store('videos', 'public');
            $videoData['video_path'] = $filePath;
            $videoData['embed_url'] = null; // Clear embed URL if local file is uploaded
        } else if ($request->has('embed_url')) {
            // If embed URL is provided, clear local path
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $videoData['video_path'] = null;
        } else if ($request->input('clear_video_path')) {
            // Allow clearing local video path if user explicitly requests (e.g. checkbox)
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $videoData['video_path'] = null;
        }


        $video->update($videoData);

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        // Delete associated video file
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được xóa thành công.');
    }
}