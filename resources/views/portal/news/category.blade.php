@extends('layouts.portal')

@section('content')
    <div class="container py-5 news-detail">
        <h2 class="mb-4 header-text">Chuyên mục: {{ $category->name }}</h2>
        <div class="row">
            @forelse ($newsList as $news)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @if ($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('portal_assets/img/default-news.png') }}" class="card-img-top"
                                alt="Default Image" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ Str::limit($news->excerpt, 100) }}</p>
                            {{-- <a href="{{ route('portal.news.show', $news->slug) }}" class="btn btn-info btn-sm">Đọc thêm</a> --}}
                        </div>
                        <div class="card-footer text-muted">
                            {{ $news->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Không có tin tức nào trong chuyên mục này.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $newsList->links() }} {{-- Hiển thị phân trang --}}
        </div>

        <div class="mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
