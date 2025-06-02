@extends('layouts.portal')

@section('content')
@section('content')
    <div class="container py-5">
        <h1>{{ $category->name }}</h1>
        <hr>
        <div class="row">
            @forelse ($documents as $document)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('portal.documents.show', $document->id) }}"
                                    class="text-dark stretched-link">{{ $document->title }}</a></h5>
                            @if ($document->trich_yeu)
                                <p class="card-text">{{ Str::limit($document->trich_yeu, 150) }}</p>
                            @endif
                            <p><strong>Ngày ban hành:</strong>
                                @if ($document->ngay_ban_hanh instanceof \DateTime)
                                    {{ $document->ngay_ban_hanh->format('d/m/Y') }}
                                @elseif ($document->ngay_ban_hanh)
                                    {{ $document->ngay_ban_hanh }}
                                @else
                                    ''
                                @endif
                            </p>
                            @if ($document->file_path)
                                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                    class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-download me-1"></i> Tải xuống
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Không có văn bản nào thuộc loại này.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $documents->links() }}
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
