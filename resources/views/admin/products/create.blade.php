@extends('layouts.admin')

@section('content')
    <h1>Thêm mới Sản phẩm</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products.form')
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
