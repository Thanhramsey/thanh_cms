@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Sửa Liên kết</h1>
        <form action="{{ route('admin.links.update', $link->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.links.form')
            <button type="submit" class="btn btn-primary">Cập nhật Liên kết</button>
            <a href="{{ route('admin.links.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
