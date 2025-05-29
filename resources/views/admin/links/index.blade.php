@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Quản lý Liên kết</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.links.create') }}" class="btn btn-primary mb-3">Thêm Liên kết</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>URL</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->name }}</td>
                        <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                        <td>
                            @if ($link->image)
                                <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->name }}" width="50">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.links.edit', $link->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('admin.links.destroy', $link->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Không có liên kết nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $links->links() }}
    </div>
@endsection
