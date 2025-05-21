@extends('layouts.portal')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4">{{ $product->name }}</h1>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid mb-4 rounded">
                @endif
                <div class="product-description">
                    {!! $product->description !!}
                </div>
                <div class="mt-5">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
