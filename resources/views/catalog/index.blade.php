@extends('layouts.main')

@section('title', 'Catalog')

@section('content')
<div class="container">
    <h1>Product Catalog</h1>
    <p>Browse through our collection of custom printing categories below.</p>
    
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-6 col-lg-4 mb-4"> <!-- Adjusted for better responsiveness -->
            <div class="card h-100">
                <!-- Display category name -->
                <a href="{{ route('catalog.category', ['category_slug' => $category->slug]) }}">
                    <h5 class="card-title">{{ $category->name }}</h5>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

