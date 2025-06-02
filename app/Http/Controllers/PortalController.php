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
use Illuminate\View\View;

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
        
        return view('portal.index', compact('menus', 'productCategories', 'newsCategories', 'bannerSettings', 'bannerImages','logo','links','documents'));
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