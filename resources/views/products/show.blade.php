@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ $product['name'] }}</h1>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product['image'] ?? 'default-image.jpg' }}" alt="{{ $product['name'] }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h5>Price: ${{ $product['price'] ?? 'N/A' }}</h5>
            <p>{{ $product['description'] }}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>
@endsection
