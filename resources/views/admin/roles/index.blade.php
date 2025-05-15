@extends('layouts.admin')

@section('content')
    <h1>Quản lý Vai trò</h1>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Slug</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-warning">Sửa</a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Không có vai trò nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $roles->links() }}
@endsection
