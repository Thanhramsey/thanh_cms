@extends('layouts.portal')
@section('content')
    <div class="container py-5 news-detail">
        <div class="row">
            <div class="col-md-9 ">
                <h1>{{ $document->title }}</h1>
                <hr>
                @if ($document->so_van_ban)
                    <p><strong>Số văn bản:</strong> {{ $document->so_van_ban }}</p>
                @endif
                @if ($document->trich_yeu)
                    <p><strong>Trích yếu:</strong> {{ $document->trich_yeu }}</p>
                @endif
                @if ($document->ngay_ban_hanh)
                    <p><strong>Ngày ban hành:</strong>
                        @if ($document->ngay_ban_hanh instanceof \DateTime)
                            {{ $document->ngay_ban_hanh->format('d/m/Y') }}
                        @elseif ($document->ngay_ban_hanh)
                            {{ $document->ngay_ban_hanh }}
                        @else
                            ''
                        @endif
                    </p>
                @endif
                @if ($document->co_quan_ban_hanh)
                    <p><strong>Cơ quan ban hành:</strong> {{ $document->co_quan_ban_hanh }}</p>
                @endif
                @if ($document->ghi_chu)
                    <p><strong>Ghi chú:</strong> {{ $document->ghi_chu }}</p>
                @endif
                @if ($document->file_path)
                    <p><strong>File đính kèm:</strong> <a href="{{ asset('storage/' . $document->file_path) }}"
                            target="_blank" class="btn btn-info btn-sm">Tải xuống</a></p>
                @endif
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3 mb-3">Quay lại</a>
            </div>
            <div class="col-md-3">
                <div class="sidebar-documents news-category-box">
                    <h5>Các văn bản khác</h5>
                    <ul class="list-unstyled">
                        @forelse ($otherDocuments as $otherDocument)
                            <li class="mb-2">
                                <i class="fas fa-file-alt me-2"></i>
                                <a
                                    href="{{ route('portal.documents.show', $otherDocument->id) }}">{{ $otherDocument->title }}</a>
                            </li>
                        @empty
                            <li>Không có văn bản khác.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
