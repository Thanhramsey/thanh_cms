<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ProductCategory;
use App\Models\Category;

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

        return view('portal.index', compact('menus', 'productCategories', 'newsCategories'));
    }
}