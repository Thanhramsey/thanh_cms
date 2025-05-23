@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Thêm Cấu hình Mới</h1>
        <form action="{{ route('admin.configs.store') }}" method="POST">
            @csrf
            @include('admin.configs.form')
            <button type="submit" class="btn btn-primary">Lưu Cấu hình</button>
            <a href="{{ route('admin.configs.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
