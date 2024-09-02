@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Welcome to American Design and Printing!</h1>
    <p>Your one-stop shop for all printing needs</p>
    <a href="{{ route('catalog.index') }}" class="btn btn-primary">View Catalog</a>
    
    <!-- Add Business Cards Button here -->
    <img src="{{ asset('images/buisness_cards/buisness_card_main.jpg') }}" class="img-fluid" alt="Business Cards">
    <a href="{{ url('/business-cards') }}" class="btn btn-secondary mt-3">Business Cards</a>

    <div class="row mt-5">
        <!-- Example product card -->
        <div class="col-md-4">
            <div class="card">
                <img src="path_to_image" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product 1</h5>
                    <p class="card-text">Brief description of the product.</p>
                    <a href="#" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for more products -->
    </div>
</div>
@endsection
