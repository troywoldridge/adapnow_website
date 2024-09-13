<!-- Main Navbar (Top Row with Search and Categories) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">American Design and Printing</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopRow">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTopRow">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop All Categories</a>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBottomRow">
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
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '14pt-matte-finish']) }}">14pt Matte Finish</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '16pt-matte-finish']) }}">16pt Matte Finish</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">UV High Gloss Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '14pt-uv']) }}">14pt UV</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '16pt-uv']) }}">16pt UV</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Lamination Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '18pt-gloss-lamination']) }}">18pt Gloss Lamination</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '18pt-matte-silk-lamination']) }}">18pt Matte + Silk Lamination</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">AQ Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '14pt-aq']) }}">14pt AQ</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '16pt-aq']) }}">16pt AQ</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Writable Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '13pt-enviro-uncoated']) }}">13pt Enviro Uncoated</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '13pt-linen-uncoated']) }}">13pt Linen Uncoated</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '14pt-writable-aq']) }}">14pt Writable + AQ</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '18pt-writable']) }}">18pt Writable</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Specialty Business Cards</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'metallic-foil']) }}">Metallic Foil</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kraft-paper']) }}">Kraft Paper</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'durable']) }}">Durable</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'spot-uv']) }}">Spot UV</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'pearl-paper']) }}">Pearl Paper</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'die-cut']) }}">Die Cut</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'soft-touch']) }}">Soft Touch</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '32pt-painted-edge']) }}">32pt Painted Edge</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'ultra-smooth']) }}">Ultra Smooth</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'matte-vinyl-banners']) }}">Matte Vinyl Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'glossy-vinyl-banners']) }}">Glossy Vinyl Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'mesh-vinyl-banners']) }}">Mesh Vinyl Banners</a></li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Pull Up Banners</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'standard-pull-up-banners']) }}">Standard Pull Up Banners</a></li>
                                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'premium-pull-up-banners']) }}">Premium Pull Up Banners</a></li>
                                    </ul>
                                </li>

                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'x-frame-banners']) }}">X-Frame Banners</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Coroplast Signs</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '4mm-coroplast']) }}">4mm Coroplast</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '6mm-coroplast']) }}">6mm Coroplast</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '8mm-coroplast']) }}">8mm Coroplast</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '10mm-coroplast']) }}">10mm Coroplast</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Floor Graphics</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'custom-floor-graphics']) }}">Custom Floor Graphics</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'social-distancing-floor-graphics']) }}">Social Distancing Floor Graphics</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'foam-board']) }}">Foam Board</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'aluminum-signs']) }}">Aluminum Signs</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'car-magnets']) }}">Car Magnets</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Table Covers</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '6-table-covers']) }}">6' Table Covers</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '8-table-covers']) }}">8' Table Covers</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'adhesive-vinyl-glossy']) }}">Adhesive Vinyl (Glossy)</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'window-graphics']) }}">Window Graphics</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'large-format-posters']) }}">Large Format Posters</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'styrene-signs']) }}">Styrene Signs</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Display Board</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '24pt-display-board']) }}">24pt Display Board</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '40pt-display-board']) }}">40pt Display Board</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Canvas</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'canvas-roll']) }}">Canvas Roll</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'stretched-canvas-prints']) }}">Stretched Canvas Prints</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'sintra-pvc']) }}">Sintra / PVC</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'a-frame-signs']) }}">A-Frame Signs</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'wall-decals']) }}">Wall Decals</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'a-frame-stands']) }}">A-Frame Stands</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'h-stands-for-signs']) }}">H-Stands for Signs</a></li>
                    </ul>
                </li>

                <!-- Stationary Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarStationary" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Stationary
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarStationary">
                        <li><a class="dropdown-item" href="{{ route('category.show', ['category_slug' => 'letterhead']) }}">Letterhead</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Envelopes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '60lb-uncoated']) }}">60lb Uncoated</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '60lb-uncoated-self-adhesive']) }}">60lb Uncoated (Self-Adhesive)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '60lb-uncoated-security']) }}">60lb Uncoated (Security)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Note Pads</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '60lb-uncoated-25-pages']) }}">60lb Uncoated (25 Pages)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => '60lb-uncoated-50-pages']) }}">60lb Uncoated (50 Pages)</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'ncr-forms']) }}">NCR Forms</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'supply-boxes']) }}">Supply Boxes</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'bopp-labels-premium']) }}">BOPP Labels (Premium)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'paper-labels-cost-effective']) }}">Paper Labels (Cost Effective)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'poly-labels-durable']) }}">Poly Labels (Durable)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'square-cut-labels']) }}">Square Cut Labels</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Product Boxes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'straight-tuck-end-product-box']) }}">Straight Tuck End Product Box</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'auto-lock-bottom-product-box']) }}">Auto-Lock Bottom Product Box</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'reverse-tuck-end-product-box']) }}">Reverse Tuck End Product Box</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'product-box-sleeves']) }}">Product Box Sleeves</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Cut To Shape Decals</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'white-vinyl-permanent']) }}">White Vinyl (Permanent)</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'white-vinyl-removable']) }}">White Vinyl (Removable)</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'supply-boxes']) }}">Supply Boxes</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 't-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'sweatshirts']) }}">Sweatshirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'tank-tops']) }}">Tank Tops</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'long-sleeve-shirts']) }}">Long Sleeve Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'hoodies']) }}">Hoodies</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'embroidered-polos']) }}">Embroidered Polos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Women's Clothing</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'womens-t-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'tank-tops']) }}">Tank Tops</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'long-sleeve-shirts']) }}">Long Sleeve Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'embroidered-polos']) }}">Embroidered Polos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Kids and Youth Clothing</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kids-t-shirts']) }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kids-sweatshirts']) }}">Sweatshirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kids-tank-tops']) }}">Tank Tops</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kids-long-sleeve-shirts']) }}">Long Sleeve Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'kids-hoodies']) }}">Hoodies</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Headwear</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'embroidered-hats']) }}">Embroidered Hats</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.show', ['slug' => 'embroidered-beanies']) }}">Embroidered Beanies</a></li>
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
