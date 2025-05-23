@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh Sửa Banner</h1>
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.banners.form')
            <button type="submit" class="btn btn-primary">Cập Nhật Banner</button>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
