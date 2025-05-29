@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Thêm Liên kết Mới</h1>
        <form action="{{ route('admin.links.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.links.form')
            <button type="submit" class="btn btn-primary">Lưu Liên kết</button>
            <a href="{{ route('admin.links.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
