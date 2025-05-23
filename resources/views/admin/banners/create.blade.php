@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Thêm Banner Mới</h1>
        <form action="{{ route('admin.banners.store') }}" method="POST">
            @csrf
            @include('admin.banners.form')
            <button type="submit" class="btn btn-primary">Lưu Banner</button>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
