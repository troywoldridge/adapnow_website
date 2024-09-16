@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">{{ $category->name }}</h1>

    @if($products->isEmpty())
        <p class="text-center">No products found in this category.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/images/{{ $category->slug }}/{{ $product->slug }}.png" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <!-- Adjust the route name here -->
                            <a href="{{ route('catalog.product', ['category_slug' => $category->slug, 'product_slug' => $product->slug]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
