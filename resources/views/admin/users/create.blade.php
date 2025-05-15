@extends('layouts.admin')

@section('content')
    <h1>Thêm mới Người dùng</h1>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                @include('admin.users.form')
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
