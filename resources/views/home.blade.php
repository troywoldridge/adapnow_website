@extends('layouts.main')

@section('content')

    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    <!-- Featured Products Section -->
    @if (count($featuredProducts) > 0)
        <h2 class="text-center my-5">Featured Products</h2>
        <div class="row">
            @foreach ($featuredProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->category->name }}</p>
                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No featured products available at the moment.</p>
    @endif

@endsection
