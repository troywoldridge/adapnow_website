@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ ucfirst($category) }} Products</h1>
    
    @if (isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <a href="{{ route('product.show', ['category' => $category, 'product' => $product['id']]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
