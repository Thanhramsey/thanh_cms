@extends('layouts.admin')

@section('content')
    <h1>Chỉnh sửa danh mục sản phẩm</h1>

    <form action="{{ route('admin.productCategories.update', $productCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.product_categories.form')
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.productCategories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
