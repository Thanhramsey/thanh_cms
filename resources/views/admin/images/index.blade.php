@extends('layouts.admin')

@section('content')
    <h1>Quản lý Hình ảnh</h1>
    <a href="{{ route('admin.images.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

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
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Nhóm</th>
                            <th>Thứ tự</th>
                            <th>Alt Text</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($images as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if ($item->path)
                                        <img src="{{ asset('storage/' . $item->path) }}"
                                            alt="{{ $item->alt_text ?? ($item->title ?? 'Ảnh') }}"
                                            style="max-width: 80px; max-height: 80px; object-fit: cover;">
                                    @else
                                        Không có ảnh
                                    @endif
                                </td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                {{-- <td>{{ $item->group }}</td> --}}
                                <td>{{ $item->categoryName() }}</td>
                                <td>{{ $item->order }}</td>
                                <td>{{ $item->alt_text }}</td>
                                <td>
                                    @if ($item->active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-danger">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.images.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Sửa</a>
                                    <form action="{{ route('admin.images.destroy', $item->id) }}" method="POST"
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
                                <td colspan="10" class="text-center">Không có hình ảnh nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $images->links() }}
@endsection
