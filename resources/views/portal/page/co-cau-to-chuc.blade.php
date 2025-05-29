@extends('layouts.portal')
@section('content')
    <div class="container mt-5 page-content">
        <h1>{{ $coCauToChuc->title }}</h1>
        <div class="content">
            {!! $coCauToChuc->content !!}
        </div>
    </div>
@endsection
