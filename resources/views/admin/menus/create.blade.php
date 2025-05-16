@extends('layouts.admin')

@section('title', 'Tạo Menu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo Menu</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf
                @include('admin.menus.form')
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
