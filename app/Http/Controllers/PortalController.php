<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class PortalController extends Controller
{
     public function index()
    {
        $menus = Menu::whereNull('parent_id')
                     ->orderBy('order')
                     ->with('children')
                     ->get();
        return view('portal.index',compact('menus'));
    }
}