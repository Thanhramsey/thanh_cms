@extends('layouts.admin')

@section('title', 'Sửa Menu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sửa Menu</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.menus.form')
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
