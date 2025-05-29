@extends('layouts.portal')
@section('content')
    <div class="container mt-5 page-content">
        <h1>{{ $gioiThieuNews->title }}</h1>
        <div class="content">
            {!! $gioiThieuNews->content !!}
        </div>
    </div>
@endsection
