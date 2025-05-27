<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact')); // Đổi view thành 'edit'
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'reply' => 'nullable|string',
            // Bạn có thể thêm validation cho các trường khác nếu cần
        ]);

        $contact->update($request->only('reply'));

        return redirect()->route('admin.contacts.index')->with('success', 'Đã cập nhật liên hệ.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Đã xóa liên hệ.');
    }
}