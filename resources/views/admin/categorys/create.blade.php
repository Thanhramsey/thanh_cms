@extends('layouts.admin')

@section('content')
    <h1>Thêm mới Danh mục</h1>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categorys.store') }}" method="POST">
                @csrf
                @include('admin.categorys.form')
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.categorys.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
