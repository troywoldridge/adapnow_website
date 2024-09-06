@extends('layouts.main')

@section('content')
<div class="container">
    @if (isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product['image'] ?? 'default-image.jpg' }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] ?? 'No description available' }}</p>
                            <h6>Price: ${{ $product['price'] ?? 'N/A' }}</h6>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
