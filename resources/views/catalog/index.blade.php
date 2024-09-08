@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Our Product Catalog</h1>

    <!-- Display message if any (Success/Error) -->
    @if (session('message'))
        <div class="alert alert-info text-center">{{ session('message') }}</div>
    @endif

    @if (isset($error))
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @endif

    <!-- Category Cards -->
    <div class="row">
        @if(count($categories) > 0)
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description ?? 'Explore products in this category' }}</p>
                            @if($category->slug)
                                <!-- Logging category slug -->
                                {{ Log::info('Category Slug: '.$category->slug) }}
                                <a href="{{ route('category.show', ['category' => $category->slug]) }}" class="btn btn-primary">
                                    View {{ $category->name }}
                                </a>
                            @else
                                <p>Missing slug for category</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No categories available at this time.</p>
        @endif
    </div>
</div>
@endsection
