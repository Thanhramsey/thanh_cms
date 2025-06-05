@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quản lý Video</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.videos.create') }}" class="btn btn-sm btn-primary">
                    <span data-feather="plus"></span>
                    Thêm Video Mới
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Nguồn</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $video)
                        <tr>
                            <td>{{ $loop->iteration + ($videos->currentPage() - 1) * $videos->perPage() }}</td>
                            <td>{{ $video->title }}</td>
                            <td>
                                @if ($video->isLocalVideo())
                                    <span class="badge bg-success">Local File</span>
                                    <a href="{{ asset('storage/' . $video->video_path) }}" target="_blank"
                                        class="ms-2">Xem</a>
                                @elseif ($video->isExternalEmbed())
                                    <span class="badge bg-info">Embed URL</span>
                                    <a href="{{ $video->embed_url }}" target="_blank" class="ms-2">Xem</a>
                                @else
                                    <span class="badge bg-secondary">Không có nguồn</span>
                                @endif
                            </td>
                            <td>{{ $video->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.videos.edit', $video->id) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa video này không?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có video nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $videos->links() }}
        </div>
    </div>
@endsection
