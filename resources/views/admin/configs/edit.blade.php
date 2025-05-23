@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh Sửa Cấu hình</h1>
        <form action="{{ route('admin.configs.update', $config->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.configs.form')
            <button type="submit" class="btn btn-primary">Cập Nhật Cấu hình</button>
            <a href="{{ route('admin.configs.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
