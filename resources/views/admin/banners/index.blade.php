@extends('layouts.admin')

@section('content')
    <h1>Quản lý Banners</h1>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Thêm Banner</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Loại</th>
                <th>Hiển thị</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->type }}</td>
                    <td>{{ $banner->is_active ? 'Có' : 'Không' }}</td>
                    <td>
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Không có banner nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $banners->links() }}
@endsection
