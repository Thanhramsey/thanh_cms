@extends('layouts.admin')

@section('content')
    <h1>Quản lý Cấu hình</h1>
    <a href="{{ route('admin.configs.create') }}" class="btn btn-primary mb-3">Thêm Cấu hình</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Key</th>
                <th>Giá trị</th>
                <th>Loại</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($configs as $config)
                <tr>
                    <td>{{ $config->id }}</td>
                    <td>{{ $config->key }}</td>
                    <td>{{ Str::limit($config->value, 50) }}</td>
                    <td>{{ $config->type }}</td>
                    <td>{{ $config->description }}</td>
                    <td>
                        <a href="{{ route('admin.configs.edit', $config->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.configs.destroy', $config->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có cấu hình nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $configs->links() }}
@endsection
