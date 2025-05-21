<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category; // Nếu bạn dùng bảng categories cho danh mục sản phẩm
use App\Models\Product;
use App\Models\Menu;
use App\Models\ProductCategory; // Nếu bạn vẫn dùng bảng product_categories
use Illuminate\View\View;

class PortalProductController extends Controller
{
    public function show(string $slug): View
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('portal.product.show', compact('product','menus'));
    }

    public function category(string $slug): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $category = ProductCategory::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $products = Product::where('category_id', $category->id)->where('is_active', true)->paginate(9);

        return view('portal.product.category', compact('category', 'products','menus'));
    }
}