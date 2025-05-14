@extends('layouts.admin')

@section('content')
    <h1>Chỉnh sửa Hình ảnh</h1>

    <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.images.form')

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

@push('scripts')
    @include('admin.modules.scripts')
@endpush
