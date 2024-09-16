<!-- Main Navbar (Top Row with Search and Categories) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">American Design and Printing</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopRow" aria-controls="navbarTopRow" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTopRow">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog.index') }}">Shop All Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ADAP Transfers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Track Order</a>
                </li>
            </ul>

            <!-- Search Form -->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- Product Categories Navbar (Second Navbar) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mt-2">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBottomRow" aria-controls="navbarBottomRow" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarBottomRow">
            <ul class="navbar-nav">

                <!-- Business Cards Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarBusinessCards" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Business Cards
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarBusinessCards">
                        <li><a class="dropdown-item" href="{{ route('category.show', ['category_slug' => 'business-cards']) }}">All Business Cards</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Matte Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'business-cards', 'product_slug' => '14pt-matte-finish']) }}">14pt Matte Finish</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'business-cards', 'product_slug' => '16pt-matte-finish']) }}">16pt Matte Finish</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">UV High Gloss Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'business-cards', 'product_slug' => '14pt-uv-high-gloss']) }}">14pt UV High Gloss</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'business-cards', 'product_slug' => '16pt-uv-high-gloss']) }}">16pt UV High Gloss</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Large Format Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLargeFormat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Large Format
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLargeFormat">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Banners</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => 'matte-vinyl-banners']) }}">Matte Vinyl Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => 'glossy-vinyl-banners']) }}">Glossy Vinyl Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => 'mesh-vinyl-banners']) }}">Mesh Vinyl Banners</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Coroplast Signs</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => '4mm-coroplast']) }}">4mm Coroplast</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => '6mm-coroplast']) }}">6mm Coroplast</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Stationery Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarStationery" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Stationery
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarStationery">
                        <li><a class="dropdown-item" href="{{ route('category.show', ['category_slug' => 'stationery']) }}">All Stationery</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Envelopes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'stationery', 'product_slug' => '60lb-uncoated']) }}">60lb Uncoated</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'stationery', 'product_slug' => '60lb-uncoated-security']) }}">60lb Uncoated Security</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Labels & Packaging Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLabelsPackaging" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Labels & Packaging
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLabelsPackaging">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Labels</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'labels-packaging', 'product_slug' => 'bopp-roll-labels']) }}">BOPP Roll Labels</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'labels-packaging', 'product_slug' => 'paper-roll-labels']) }}">Paper Roll Labels</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Apparel Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarApparel" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Apparel
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarApparel">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Men's Clothing</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 't-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'tank-tops']) }}">Tank Tops</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Women's Clothing</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'womens-t-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'tank-tops']) }}">Tank Tops</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Kids and Youth Clothing</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'kids-t-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'kids-sweatshirts']) }}">Sweatshirts</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Headwear</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'embroidered-hats']) }}">Embroidered Hats</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['category_slug' => 'apparel', 'product_slug' => 'embroidered-beanies']) }}">Embroidered Beanies</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Sample Kits -->
                <li class="nav-item"><a class="nav-link" href="#">Sample Kits</a></li>
            </ul>
        </div>
    </div>
</nav>
    
