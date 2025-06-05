<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menu;
use App\Models\Config; // Import model Image
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortalImageController extends Controller
{
    /**
     * Display a listing of the images on the portal.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Lấy tất cả hình ảnh, có thể phân trang nếu số lượng lớn
        $images = Image::latest()->paginate(12); // Lấy 12 hình ảnh mỗi trang, sắp xếp mới nhất trước
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
           $logo = Config::where('key', 'logo_path')->first();   

        return view('portal.media.index', compact('images','menus','logo'));
    }
}