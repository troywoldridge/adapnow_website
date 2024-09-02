@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Business Cards</h1>
    <p>Select from our wide range of business card options:</p>
    <div class="row">
        <!-- Example Card -->
        <div class="col-md-4">
            <div class="card">
                <img src="/path-to-image/standard-card.jpg" class="card-img-top" alt="Standard Business Cards">
                <div class="card-body">
                    <h5 class="card-title">Standard Business Cards</h5>
                    <p class="card-text">Professional services for Custom Business Card Printing and Personalized Cards.</p>
                    <a href="{{ url('/business-cards/standard') }}" class="btn btn-primary">See Details</a>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for more cards -->
        <!-- Example for Laminated Business Cards -->
        <div class="col-md-4">
            <div class="card">
                <img src="/path-to-image/laminated-card.jpg" class="card-img-top" alt="Laminated Business Cards">
                <div class="card-body">
                    <h5 class="card-title">Laminated Business Cards</h5>
                    <p class="card-text">Durable and stylish, perfect for making a lasting impression.</p>
                    <a href="{{ url('/business-cards/laminated') }}" class="btn btn-primary">See Details</a>
                </div>
            </div>
        </div>
        <!-- Add more cards as needed -->
    </div>
</div>
@endsection
