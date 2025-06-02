@extends('layouts.admin')


@section('content')
    <h1>Thêm Văn bản Mới</h1>
    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.documents.form')
        <button type="submit" class="btn btn-primary">Lưu Văn bản</button>
        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
