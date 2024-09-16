@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{ $product->name }}</h1>
        </div>

        <div class="col-md-6 mt-3">
            <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <p><strong>SKU:</strong> {{ $product->sku ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description available.' }}</p>
            
            @if(!is_null($product->price))
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            @else
                <p><strong>Price:</strong> Contact for pricing.</p>
            @endif

            <!-- Example of adding the set choices dropdown -->
            @if(isset($setChoices) && $setChoices->isNotEmpty())
                <div class="form-group">
                    <label for="set_choice">Choose Set:</label>
                    <select class="form-control" id="set_choice" name="set_choice">
                        @foreach($setChoices as $choice)
                            <option value="{{ $choice }}">{{ $choice }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>

        <div class="col-md-6">
            <!-- Assuming you have an image for the product -->
            <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('catalog.index') }}" class="btn btn-primary">Back to Catalog</a>
    </div>
</div>
@endsection
