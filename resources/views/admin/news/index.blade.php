@extends('layouts.admin')

@section('content')
    <h1>Quản lý Tin Tức</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

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
                            <th>Tiêu đề</th>
                            <th>Ngày đăng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($news as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->published_at ? $item->published_at->format('d/m/Y H:i') : 'Chưa đăng' }}</td>
                                <td>
                                    @if ($item->is_published)
                                        <span class="badge bg-success">Đã đăng</span>
                                    @else
                                        <span class="badge bg-warning">Chưa đăng</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Sửa</a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
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
                                <td colspan="5" class="text-center">Không có tin tức nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $news->links() }}
@endsection
