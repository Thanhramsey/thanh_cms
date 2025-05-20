@extends('layouts.portal')

@section('content')
    <div class="container py-5 news-detail">
        <div class="row">
            <div class="col-md-9">
                <h1 class="mb-4">{{ $newsItem->title }}</h1>
                <p class="text-muted mb-3">Đăng ngày: {{ $newsItem->created_at->format('F j, Y') }}</p>

                {{-- @if ($newsItem->image)
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                        class="img-fluid mb-4 rounded">
                @endif --}}

                <div class="news-content">
                    {!! $newsItem->content !!}
                </div>

                <div class="mt-5">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tin Tức Liên Quan</h5>
                        <ul class="list-unstyled">
                            @forelse ($relatedNews as $news)
                                <li class="mb-3">
                                    <a href="{{ route('portal.news.show', $news->slug) }}" class="text-dark">
                                        {{ $news->title }}
                                    </a>
                                    <br>
                                    <small class="text-muted">{{ $news->created_at->diffForHumans() }}</small>
                                </li>
                            @empty
                                <p class="text-muted">Không có tin tức liên quan.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
