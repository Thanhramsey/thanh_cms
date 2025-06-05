@extends('layouts.admin') {{-- Hoặc layout admin của bạn --}}

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Thêm Video Mới</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Thông tin Video
            </div>
            <div class="card-body">
                <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.videos.form') {{-- Bao gồm form chung --}}
                    <button type="submit" class="btn btn-primary">Lưu Video</button>
                    <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
@endsection
