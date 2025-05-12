@extends('layouts.admin')

@section('content')
    <h1>Chỉnh sửa Tin Tức</h1>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.news.form')

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

@push('scripts')
    @include('admin.news.scripts')
@endpush
