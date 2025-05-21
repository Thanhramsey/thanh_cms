@extends('layouts.portal')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Danh mục: {{ $category->name }}</h2>
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('portal_assets/img/default-product.png') }}" class="card-img-top"
                                alt="Default Image" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <a href="{{ route('portal.product.show', $product->slug) }}" class="btn btn-primary btn-sm">Xem
                                chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
        <div class="mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
