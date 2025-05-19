<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\ProductCategory;

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

    
        return view('portal.index',compact('menus','productCategories'));
    }
}