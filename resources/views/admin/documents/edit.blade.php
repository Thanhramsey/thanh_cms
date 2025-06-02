@extends('layouts.admin')


@section('content')
    <h1>Sửa Văn bản</h1>
    <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.documents.form')
        <button type="submit" class="btn btn-primary">Cập nhật Văn bản</button>
        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
