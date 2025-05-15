@extends('layouts.admin')

@section('content')
    <h1>Quản lý Người dùng</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

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
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roleName() }}</td>
                                <td>
                                    @if ($user->status === 1)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-warning">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="btn btn-sm btn-warning">Sửa</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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
                                <td colspan="6" class="text-center">Không có người dùng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $users->links() }}
@endsection
