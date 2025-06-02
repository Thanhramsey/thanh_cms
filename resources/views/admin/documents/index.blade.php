@extends('layouts.admin')


@section('content')
    {{-- <div class="container"> --}}
    <h1>Quản lý Văn bản</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.documents.create') }}" class="btn btn-primary mb-3">Thêm Văn bản</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Số văn bản</th>
                <th>Trích yếu</th>
                <th>Ngày ban hành</th>
                <th>Cơ quan ban hành</th>
                <th>File</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->so_van_ban }}</td>
                    <td>{{ $document->trich_yeu }}</td>
                    <td>
                        @if ($document->ngay_ban_hanh instanceof \DateTime)
                            {{ $document->ngay_ban_hanh->format('d/m/Y') }}
                        @elseif ($document->ngay_ban_hanh)
                            {{ $document->ngay_ban_hanh }} {{-- Hiển thị nếu không phải đối tượng DateTime --}}
                        @else
                            ''
                        @endif
                    </td>
                    <td>{{ $document->co_quan_ban_hanh }}</td>
                    <td>
                        @if ($document->file_path)
                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Tải xuống</a>
                        @else
                            Chưa có file
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Không có văn bản nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $documents->links() }}
    {{-- </div> --}}
@endsection
