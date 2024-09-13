@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{ $product->name }}</h1>
        </div>

        <div class="col-md-6 mt-3">
            <p><strong>SKU:</strong> {{ $product->sku ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description available.' }}</p>
            
            @if(!is_null($product->price))
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            @else
                <p><strong>Price:</strong> Contact for pricing.</p>
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('catalog.index') }}" class="btn btn-primary">Back to Catalog</a>
    </div>
</div>
@endsection
