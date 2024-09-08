@extends('layouts.main')

@section('content')
<div class="container">
    <h1>TEST MESSAGE: Home Page</h1>
    <h1 class="my-4 text-center">Our Product Catalog</h1>
    
    <!-- Category Buttons (Dropdowns for each category) -->
    <div class="row text-center mb-4">
        <!-- Business Cards Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="businessCardsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Business Cards
                </button>
                <ul class="dropdown-menu" aria-labelledby="businessCardsDropdown">
                    <li><h6 class="dropdown-header">Standard</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/quick-ship') }}">Quick Ship Business Cards</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/14pt-profit-maximizer') }}">14pt (Profit Maximizer)</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/14pt-matte-finish') }}">14pt + Matte Finish</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/16pt-matte-finish') }}">16pt + Matte Finish</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/14pt-uv') }}">14pt + UV (High Gloss)</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/16pt-uv') }}">16pt + UV (High Gloss)</a></li>
                    <li><h6 class="dropdown-header">Specialty</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/metallic-foil') }}">Metallic Foil (Raised)</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/kraft-paper') }}">Kraft Paper</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/durable') }}">Durable</a></li>
                    <li><a class="dropdown-item" href="{{ url('/business-cards/spot-uv') }}">Spot UV (Raised)</a></li>
                </ul>
            </div>
        </div>

        <!-- Print Products Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="printProductsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Print Products
                </button>
                <ul class="dropdown-menu" aria-labelledby="printProductsDropdown">
                    <li><h6 class="dropdown-header">Postcards</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/postcards/10pt-matte') }}">10pt + Matte Finish</a></li>
                    <li><a class="dropdown-item" href="{{ url('/postcards/14pt-matte') }}">14pt + Matte Finish</a></li>
                    <li><a class="dropdown-item" href="{{ url('/postcards/16pt-matte') }}">16pt + Matte Finish</a></li>
                    <li><h6 class="dropdown-header">Flyers</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/flyers/100lb-gloss-text') }}">100lb Gloss Text</a></li>
                    <li><a class="dropdown-item" href="{{ url('/flyers/100lb-uv') }}">100lb + UV (High Gloss)</a></li>
                </ul>
            </div>
        </div>

        <!-- Large Format Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="largeFormatDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Large Format
                </button>
                <ul class="dropdown-menu" aria-labelledby="largeFormatDropdown">
                    <li><a class="dropdown-item" href="{{ url('/large-format/coroplast-4mm') }}">4mm Coroplast (Yard Signs)</a></li>
                    <li><a class="dropdown-item" href="{{ url('/large-format/6mm-coroplast') }}">6mm Coroplast</a></li>
                    <li><a class="dropdown-item" href="{{ url('/large-format/8mm-coroplast') }}">8mm Coroplast</a></li>
                </ul>
            </div>
        </div>

        <!-- Stationary Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="stationaryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Stationary
                </button>
                <ul class="dropdown-menu" aria-labelledby="stationaryDropdown">
                    <li><a class="dropdown-item" href="{{ url('/stationary/letterhead-60lb') }}">60lb Uncoated Letterhead</a></li>
                    <li><a class="dropdown-item" href="{{ url('/stationary/envelopes-60lb') }}">60lb Uncoated Envelopes</a></li>
                </ul>
            </div>
        </div>

        <!-- Promotional Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="promotionalDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Promotional
                </button>
                <ul class="dropdown-menu" aria-labelledby="promotionalDropdown">
                    <li><a class="dropdown-item" href="{{ url('/promotional/mugs-11oz') }}">11oz Ceramic Mug</a></li>
                    <li><a class="dropdown-item" href="{{ url('/promotional/mugs-15oz') }}">15oz Ceramic Mug</a></li>
                </ul>
            </div>
        </div>

        <!-- Labels & Packaging Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="labelsPackagingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Labels & Packaging
                </button>
                <ul class="dropdown-menu" aria-labelledby="labelsPackagingDropdown">
                    <li><a class="dropdown-item" href="{{ url('/labels/bopp-premium') }}">BOPP Labels (Premium)</a></li>
                    <li><a class="dropdown-item" href="{{ url('/labels/paper-labels') }}">Paper Labels (Most Cost Effective)</a></li>
                </ul>
            </div>
        </div>

        <!-- Apparel Dropdown -->
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="apparelDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Apparel
                </button>
                <ul class="dropdown-menu" aria-labelledby="apparelDropdown">
                    <li><h6 class="dropdown-header">Men's Clothing</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/apparel/mens-tshirts') }}">T-Shirts</a></li>
                    <li><a class="dropdown-item" href="{{ url('/apparel/mens-hoodies') }}">Hoodies</a></li>
                    <li><h6 class="dropdown-header">Women's Clothing</h6></li>
                    <li><a class="dropdown-item" href="{{ url('/apparel/womens-tshirts') }}">T-Shirts</a></li>
                    <li><a class="dropdown-item" href="{{ url('/apparel/womens-hoodies') }}">Hoodies</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
