@extends('layouts.admin')

@section('content')
    <h1>Thêm mới danh mục sản phẩm</h1>

    <form action="{{ route('admin.productCategories.store') }}" method="POST">
        @csrf
        @include('admin.product_categories.form')
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.productCategories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
