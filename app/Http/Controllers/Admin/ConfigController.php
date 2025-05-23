<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::paginate(10);
        return view('admin.configs.index', compact('configs'));
    }

    public function create()
    {
        return view('admin.configs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:configs',
            'value' => 'nullable|string',
            'type' => 'nullable|in:text,image,email,number,json',
            'description' => 'nullable|string',
        ]);

        Config::create($request->all());

        return redirect()->route('admin.configs.index')->with('success', 'Cấu hình đã được thêm.');
    }

    public function edit(Config $config)
    {
        return view('admin.configs.edit', compact('config'));
    }

    public function update(Request $request, Config $config)
    {
        $request->validate([
            'value' => 'nullable|string',
            'type' => 'nullable|in:text,image,email,number,json',
            'description' => 'nullable|string',
        ]);

        $config->update($request->only('value', 'type', 'description'));

        return redirect()->route('admin.configs.index')->with('success', 'Cấu hình đã được cập nhật.');
    }

    public function destroy(Config $config)
    {
        $config->delete();
        return redirect()->route('admin.configs.index')->with('success', 'Cấu hình đã được xóa.');
    }
}