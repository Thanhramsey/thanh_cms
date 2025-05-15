@extends('layouts.admin')

@section('content')
    <h1>Sửa Vai trò</h1>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.roles.form')
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
