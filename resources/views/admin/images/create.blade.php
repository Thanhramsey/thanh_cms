@extends('layouts.admin')

@section('content')
    <h1>Thêm mới Hình ảnh</h1>

    <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.images.form')

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

@push('scripts')
    @include('admin.modules.scripts')
@endpush
