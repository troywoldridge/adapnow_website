@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center">{{ $product->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ number_format($product->price, 2) }}</p>
            <a href="{{ route('catalog.index') }}" class="btn btn-primary">Back to Catalog</a>
        </div>
    </div>
</div>
@endsection
