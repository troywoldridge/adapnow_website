@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Large Format Printing</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/apparel/mens-clothing/category-men.jpg') }}" alt="Men's Clothing" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Men's Clothing</h5>
                    <p class="card-text">Browse through our high-quality men's apparel.</p>
                    <a href="{{ route('category.show', ['category' => 'mens-clothing']) }}" class="btn btn-primary">View Men's Clothing</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/apparel/womens-clothing/category-women.jpg') }}" alt="Women's Clothing" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Women's Clothing</h5>
                    <p class="card-text">Explore a wide variety of women's clothing options.</p>
                    <a href="{{ route('category.show', ['category' => 'womens-clothing']) }}" class="btn btn-primary">View Women's Clothing</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/apparel/accessories/category-accessories.jpg') }}" alt="Accessories" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Banners</h5>
                    <p class="card-text">your sourcce for all you large format needs!</p>
                    <a href="{{ route('category.show', ['category' => 'Large Format']) }}" class="btn btn-primary">View Accessories</a>
                </div>
            </div>
        </div>

        <!-- Add more product categories here as needed -->
    </div>
</div>
@endsection
