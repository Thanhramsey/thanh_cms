@extends('layouts.portal')

@section('content')
    <div class="container py-5 border-detail">
        <h1>{{ $category->name }}</h1>
        <hr>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('portal.documents.category', $category->slug) }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="so_van_ban">Số văn bản:</label>
                                <input type="text" name="so_van_ban" id="so_van_ban" class="form-control"
                                    value="{{ request('so_van_ban') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trich_yeu">Trích yếu:</label>
                                <input type="text" name="trich_yeu" id="trich_yeu" class="form-control"
                                    value="{{ request('trich_yeu') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="co_quan_ban_hanh">Cơ quan ban hành:</label>
                                <input type="text" name="co_quan_ban_hanh" id="co_quan_ban_hanh" class="form-control"
                                    value="{{ request('co_quan_ban_hanh') }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    <a href="{{ route('portal.documents.category', $category->slug) }}" class="btn btn-secondary">Reset</a>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Số ký hiệu</th>
                        <th>Tiêu đề</th>
                        <th>Trích yếu</th>
                        <th>Ngày ban hành</th>
                        <th>Tải xuống</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                        <tr>
                            <td>{{ Str::limit($document->so_van_ban, 200) }}</td>
                            <td><a href="{{ route('portal.documents.show', $document->id) }}">{{ $document->title }}</a>
                            </td>
                            <td>{{ Str::limit($document->trich_yeu, 200) }}</td>
                            <td>
                                @if ($document->ngay_ban_hanh instanceof \DateTime)
                                    {{ $document->ngay_ban_hanh->format('d/m/Y') }}
                                @elseif ($document->ngay_ban_hanh)
                                    {{ $document->ngay_ban_hanh }}
                                @else
                                    ''
                                @endif
                            </td>
                            <td>
                                @if ($document->file_path)
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-download me-1"></i> Tải xuống
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Không có văn bản nào thuộc loại này.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $documents->links() }}
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
