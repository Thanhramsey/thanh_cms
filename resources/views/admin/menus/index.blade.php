@extends('layouts.admin')

@section('title', 'Quản lý Menu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách Menu</h3>
            <div class="card-tools">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Đường dẫn</th>
                            <th>Thứ tự</th>
                            <th>Menu cha</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->url }}</td>
                                <td>{{ $menu->order }}</td>
                                <td>{{ $menu->parent ? $menu->parent->title : '---' }}</td>
                                <td>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                        class="btn btn-sm btn-primary">Sửa</a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
