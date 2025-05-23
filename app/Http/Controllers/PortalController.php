<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Image;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $productCategories = ProductCategory::with('products')->where('is_active', true)->get();
        $newsCategories = Category::where('module', 'news')->where('active', 1)->with('news')->get();
        $bannerSettings = Banner::where('is_active', true)->first();
        $bannerImages = Image::where('group', 1)->get();
        
        return view('portal.index', compact('menus', 'productCategories', 'newsCategories', 'bannerSettings', 'bannerImages'));
    }
}