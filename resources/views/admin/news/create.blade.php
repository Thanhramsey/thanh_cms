@extends('layouts.admin')

@section('content')
    <h1>Thêm mới Tin Tức</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.news.form')

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

@push('scripts')
    @include('admin.modules.scripts')
@endpush
