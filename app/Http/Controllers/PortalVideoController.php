<?php

namespace App\Http\Controllers;

use App\Models\Video; // Import model Video
use App\Models\Menu;
use App\Models\Config; 
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortalVideoController extends Controller
{
    /**
     * Display a listing of the videos on the portal.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Lấy tất cả video. Nếu bạn có trường 'is_published' trong bảng video,
        // hãy lọc ra chỉ những video đã xuất bản:
        // $videos = Video::where('is_published', true)->latest()->paginate(12);
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
           $logo = Config::where('key', 'logo_path')->first();   
        $videos = Video::latest()->paginate(12); // Lấy 12 video mỗi trang, sắp xếp mới nhất trước

        return view('portal.videos.index', compact('videos','logo','menus'));
    }

    /**
     * Display the specified video on the portal (optional).
     * You would need a route like: Route::get('/video/{video}', [PortalVideoController::class, 'show'])->name('videos.show');
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\View\View
     */
    // public function show(Video $video): View
    // {
    //     // Lấy các video khác (nếu cần cho sidebar hoặc dưới cùng trang)
    //     $otherVideos = Video::where('id', '!=', $video->id)->latest()->take(5)->get();
    //     return view('portal.videos.show', compact('video', 'otherVideos'));
    // }
}