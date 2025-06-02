<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Menu;
use App\Models\Config;
use App\Models\Document;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PortalNewsController extends Controller
{
    public function show(string $slug): View
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
           $logo = Config::where('key', 'logo_path')->first();    
        $newsItem = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $newsItem->id) // Không bao gồm bài viết hiện tại
            ->orderBy('created_at', 'desc')
            ->take(5) // Lấy 5 tin tức mới nhất khác
            ->get();
        return view('portal.news.show', compact('newsItem', 'menus', 'relatedNews','logo'));
    }

    public function category(string $slug): View
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();        
        $category = Category::where('slug', $slug)->where('module', 'news')->where('active', true)->firstOrFail();
        $newsList = News::where('type_id', $category->id)->where('is_published', true)->paginate(9); // Ví dụ: phân trang 9 tin tức
        return view('portal.news.category', compact('category', 'newsList', 'menus','logo'));
    }

     public function showDocuments(Document $document): View
    {
         $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
           $logo = Config::where('key', 'logo_path')->first();    
            $otherDocuments = Document::where('id', '!=', $document->id)->latest()->take(5)->get();
        return view('portal.documents.show', compact('document','menus','logo','otherDocuments'));
    }

    public function indexByCategory(\App\Models\Category $category, Request $request)
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();    
        $query = Document::where('category_id', $category->id);

        if ($request->has('so_van_ban')) {
            $query->where('so_van_ban', 'like', '%' . $request->so_van_ban . '%');
        }

        if ($request->has('trich_yeu')) {
            $query->where('trich_yeu', 'like', '%' . $request->trich_yeu . '%');
        }

        if ($request->has('co_quan_ban_hanh')) {
            $query->where('co_quan_ban_hanh', 'like', '%' . $request->co_quan_ban_hanh . '%');
        }

        $documents = $query->latest()->paginate(10)->withQueryString();
        return view('portal.documents.index', compact('documents', 'category','menus','logo'));
    }
}