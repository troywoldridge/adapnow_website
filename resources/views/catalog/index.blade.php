@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Our Product Catalog</h1>

    <!-- Alert message for any session or errors -->
    @if (session('message'))
        <div class="alert alert-info text-center">{{ session('message') }}</div>
    @endif

    @if (isset($error))
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @endif

    <!-- Category Dropdown Menu -->
    <div class="row mb-4">
        <!-- Dropdown for Business Cards -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="BusinessCardsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Business Cards
                </button>
                <div class="dropdown-menu" aria-labelledby="BusinessCardsDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'business-cards') }}">All Business Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'business-cards', 'product' => 1]) }}">14pt Business Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'business-cards', 'product' => 2]) }}">16pt Business Cards</a>
                </div>
            </div>
        </div>

        <!-- Dropdown for Print Products -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="PrintProductsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Print Products
                </button>
                <div class="dropdown-menu" aria-labelledby="PrintProductsDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'print-products') }}">All Print Products</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 1]) }}">Postcards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 2]) }}">Flyers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 3]) }}">Brochures</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 4]) }}">Bookmarks</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 5]) }}">Presentation Folders</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 6]) }}">Booklets</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 7]) }}">Magnets</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 8]) }}">Greeting Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 9]) }}">Invitations/Announcements</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 10]) }}">Numbered Tickets</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 11]) }}">Wall Calendars</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 12]) }}">Variable Printing</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 13]) }}">Posters</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 14]) }}">Door Hangers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 15]) }}">Digital Sheets</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 16]) }}">Folded Business Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 17]) }}">Tent Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 18]) }}">Plastics</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 19]) }}">Tear Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'print-products', 'product' => 20]) }}">Clings</a>
                </div>
            </div>
        </div>

        <!-- Dropdown for Large Format -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="LargeFormatDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Large Format
                </button>
                <div class="dropdown-menu" aria-labelledby="LargeFormatDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'large-format') }}">All Large Format</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 1]) }}">Coroplast Signs & Yard Signs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 2]) }}">Floor Graphics</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 3]) }}">Foam Board</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 4]) }}">Aluminum Signs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 5]) }}">Banners</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 6]) }}">Pull Up Banners</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 7]) }}">Car Magnets</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 8]) }}">Table Covers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 9]) }}">Adhesive Vinyl</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 10]) }}">Window Graphics</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 11]) }}">Large Format Posters</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 12]) }}">Styrene Signs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 13]) }}">Display Board / POP</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 14]) }}">Canvas</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 15]) }}">Sintra / PVC</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 16]) }}">X-Frame Signs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 17]) }}">A-Frame Signs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 18]) }}">Wall Decals</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown for Stationery -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="StationeryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stationery
                </button>
                <div class="dropdown-menu" aria-labelledby="StationeryDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'stationery') }}">All Stationery</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'stationery', 'product' => 1]) }}">Letterhead</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'stationery', 'product' => 2]) }}">Envelopes</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'stationery', 'product' => 3]) }}">Notepads</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'stationery', 'product' => 4]) }}">NCR Forms</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'stationery', 'product' => 5]) }}">Supply Boxes</a>
                </div>
            </div>
        </div>

        <!-- Dropdown for Promotional Products -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="PromotionalDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Promotional
                </button>
                <div class="dropdown-menu" aria-labelledby="PromotionalDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'promotional') }}">All Promotional Products</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 1]) }}">Mugs</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 2]) }}">Bottles</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 3]) }}">Puzzles</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 4]) }}">Canvas</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 5]) }}">Tumblers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 6]) }}">Mason Jars</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 7]) }}">Keychains</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 8]) }}">Mouse Pads</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'promotional', 'product' => 9]) }}">Photo Panels</a>
                </div>
            </div>
        </div>

        <!-- Dropdown for Apparel -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="ApparelDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Apparel
                </button>
                <div class="dropdown-menu" aria-labelledby="ApparelDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'apparel') }}">All Apparel</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'apparel', 'product' => 1]) }}">Men's Clothing</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'apparel', 'product' => 2]) }}">Women's Clothing</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'apparel', 'product' => 3]) }}">Kids and Youth Clothing</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'apparel', 'product' => 4]) }}">Accessories</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section (Product Cards) -->
    <div class="row">
        @if (isset($products) && !empty($products))
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product['image'] ?? 'default-image.jpg' }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] ?? 'No description available' }}</p>
                            <h6>Price: ${{ $product['price'] ?? 'N/A' }}</h6>
                            <a href="{{ route('product.show', ['category' => $product['category'], 'product' => $product['id']]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <p>No products available at the moment.</p>
            </div>
        @endif
    </div>
</div>
@endsection
