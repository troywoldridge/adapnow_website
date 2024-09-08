<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('catalog.index') }}">Your Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.show', ['category' => 'business-cards.index']) }}">Business Cards</a>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.show', ['category' => 'large-format.index']) }}">Large Format</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catagory.show', ['catagory' => 'print-products.index']) }}">Print Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catagory.show', ['catagory' => 'stationery.index']) }}">Stationery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catagory.show', ['catagory' => 'labels.index']) }}">Labels & Packaging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catagory.show', ['catagory' => 'apparel.index']) }}">Apparel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
