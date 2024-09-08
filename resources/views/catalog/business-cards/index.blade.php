@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Business Cards</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/business_cards/16pt_uv.png') }}" alt="16pt UV Business Cards" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">16pt UV Business Cards</h5>
                    <p class="card-text">High gloss UV coating for a polished look.</p>
                    <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '16pt-uv']) }}" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/business_cards/16pt_matte-business-cards.png') }}" alt="16pt Matte Finish Business Cards" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">16pt Matte Finish Business Cards</h5>
                    <p class="card-text">Smooth matte finish for a refined look.</p>
                    <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '16pt-matte-finish']) }}" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>

        <!-- Add more product cards here as needed -->
    </div>
</div>
@endsection
