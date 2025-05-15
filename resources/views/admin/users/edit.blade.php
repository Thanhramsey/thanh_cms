@extends('layouts.admin')

@section('content')
    <h1>Sửa Người dùng</h1>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.users.form')
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
