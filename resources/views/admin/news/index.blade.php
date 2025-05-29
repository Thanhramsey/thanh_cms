@extends('layouts.admin')

@section('content')
    <h1>Quản lý Tin Tức</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-sm" style="table-layout: fixed;">
            <thead class="thead-light">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 100px;">Loại tin</th>
                    <th style="width: 200px;">Tiêu đề</th>
                    <th style="width: 250px;">Tóm tắt</th>
                    <th style="width: 150px;">Ngày đăng</th>
                    <th style="width: 150px;">Người đăng</th>
                    <th style="width: 120px;">Trạng thái</th>
                    <th style="width: 130px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->categoryName() }}</td>
                        <td class="text-wrap">{{ \Str::limit($item->title, 100) }}</td>
                        <td class="text-wrap">{{ \Str::limit($item->summary, 100) }}</td>
                        <td>
                            @if ($item->published_at instanceof \DateTimeInterface)
                                {{ $item->published_at->format('d/m/Y H:i') }}
                            @else
                                {{ $item->published_at ?? 'Chưa đăng' }}
                            @endif
                        </td>
                        <td>{{ optional($item->user)->name ?? 'Không có' }}</td>
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
    </div>
@endsection
