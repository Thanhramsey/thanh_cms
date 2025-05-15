<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        Role::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Vai trò đã được thêm thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', \Illuminate\Validation\Rule::unique('roles')->ignore($role->id)],
        ]);

        $role->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Vai trò đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Bạn có thể thêm logic kiểm tra xem có user nào đang sử dụng role này không
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Vai trò đã được xóa thành công.');
    }
}