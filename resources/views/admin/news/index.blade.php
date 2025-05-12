@extends('layouts.admin')

@section('content')
    <h1>Quản lý Tin Tức</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th>Ngày đăng</th>
                        <th>Người đăng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->summary }}</td>
                            <td>
                                @if ($item->published_at instanceof \DateTimeInterface)
                                    {{ $item->published_at->format('d/m/Y H:i') }}
                                @else
                                    {{ $item->published_at ? $item->published_at : 'Chưa đăng' }}
                                @endif
                            </td>
                            <td>{{ $item->user ? $item->user->name : 'Không có' }}</td>
                            <td>
                                @if ($item->is_published)
                                    <span class="badge bg-success">Đã đăng</span>
                                @else
                                    <span class="badge bg-warning">Chưa đăng</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
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
                            <td colspan="7" class="text-center">Không có tin tức nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $news->links() }}
        </div>
    </div>
@endsection
