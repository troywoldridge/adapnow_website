@extends('layouts.main')

@section('title', 'Catalog')

@section('content')
<div class="container">
    <h1>Product Catalog</h1>
    <p>Browse through our collection of custom printing products below.</p>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
