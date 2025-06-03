<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Image;
use App\Models\Config;
use App\Models\News;
use App\Models\Link;
use App\Models\Document;
use App\Models\PageView;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        $productCategories = ProductCategory::with('products')->where('is_active', true)->get();
        $newsCategories = Category::where('module', 'news')->where('active', 1)->with('news')->get();
        $bannerSettings = Banner::where('is_active', true)->first();
        $bannerImages = Image::where('group', 1)->get();
        $documents = Document::all(); // Lấy tất cả văn bản
        $links = Link::all(); // Lấy tất cả liên kết
        $marquee = Config::where('key', 'marquee')->first();
        $promote = Config::where('key', 'promote')->first();
        $statistics = $this->getAccessStatistics();
        
        return view('portal.index', compact('menus', 'productCategories', 'newsCategories', 'bannerSettings',
        'bannerImages','logo','links','documents','marquee','statistics','promote'));
    }

     private function getAccessStatistics()
    {
        // Cache kết quả thống kê để tránh truy vấn DB quá nhiều lần
        return Cache::remember('access_statistics', 60, function () { // Cache trong 60 giây
            $today = Carbon::today();
            $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY); // Bắt đầu tuần từ Thứ Hai
            $startOfMonth = Carbon::now()->startOfMonth();

            $onlineUsers = PageView::where('created_at', '>=', Carbon::now()->subMinutes(5))
                                   ->distinct('session_id')
                                   ->count('session_id');

            $todayViews = PageView::whereDate('view_date', $today)
                                  ->distinct('session_id')
                                  ->count('session_id');
            $weeklyViews = PageView::whereDate('view_date', '>=', $startOfWeek)
                                   ->distinct('session_id')
                                   ->count('session_id');

            $monthlyViews = PageView::whereDate('view_date', '>=', $startOfMonth)
                                    ->distinct('session_id')
                                    ->count('session_id');
            $totalViews = PageView::distinct('session_id')->count('session_id');

            return [
                'online' => $onlineUsers,
                'today' => $todayViews,
                'this_week' => $weeklyViews,
                'this_month' => $monthlyViews,
                'total' => $totalViews,
            ];
        });
    }

    public function gioiThieu(): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        $gioiThieuNews = News::where('slug', 'tin-gioi-thieu')->firstOrFail();
        return view('portal.page.gioi-thieu', compact('gioiThieuNews','menus','logo'));
    }
    public function coCauToChuc(): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        $coCauToChuc = News::where('slug', 'co-cau-to-chuc')->firstOrFail();
        return view('portal.page.co-cau-to-chuc', compact('coCauToChuc','menus','logo'));
    }
    public function danhSachNhanVien(): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        $gioiThieuNews = News::where('slug', 'danh-sach-nhan-vien')->firstOrFail();
        return view('portal.page.danhsachnhanvien', compact('gioiThieuNews','menus','logo'));
    }

     public function lienHe(): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        
        $gioiThieuNews = News::where('slug', 'danh-sach-nhan-vien')->firstOrFail();
        return view('portal.page.lienhe', compact('gioiThieuNews','menus','logo'));
    }

}