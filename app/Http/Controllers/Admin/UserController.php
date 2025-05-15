<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|integer',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role', 0), // Mặc định là normal (0)
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'status' => $request->input('status') ? 1 : 0,
        ]);

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public/avatars');
            $user->save();
        }

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được thêm thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|integer',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            // 'status' => 'nullable|boolean',
        ];

        $request->validate($rules);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role', 0);
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->status = $request->input('status') ? 1 : 0;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('public/avatars');
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa thành công.');
    }
}