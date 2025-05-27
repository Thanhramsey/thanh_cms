<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Contact;
use App\Models\Config;
use App\Models\Menu;

class PortalContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'pick_date' => 'nullable|date', // Thêm validation cho pick_date
        ]);

        Contact::create($request->all());

        return response()->json(['success' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
    }
    public function showFindForm()
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        return view('portal.contact.find-contact',compact('logo','menus'));
    }

    public function findContact(Request $request)
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();
        $logo = Config::where('key', 'logo_path')->first();
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        $contact = Contact::where('phone', $request->input('phone'))->first();

        if ($contact) {
            return view('portal.contact.show-contact', compact('contact','logo','menus'));
        } else {
            return back()->with('error', 'Không tìm thấy liên hệ với số điện thoại này.');
        }
    }
}