<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>American Design and Printing</h1>
        <nav>
            <ul>
                <li><a href="#business-cards">Business Cards</a></li>
                <li><a href="#print-products">Print Products</a></li>
                <li><a href="#large-format">Large Format</a></li>
                <li><a href="#stationary">Stationary</a></li>
                <li><a href="#promotional">Promotional</a></li>
                <li><a href="#labels-packaging">Labels & Packaging</a></li>
                <li><a href="#apparel">Apparel</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="business-cards" class="product-category">
            <h2>Business Cards</h2>
            <div class="subcategories">
                <div class="subcategory">
                    <h3>Standard</h3>
                    <ul id="standard-business-cards">
                        <!-- JavaScript will populate this list -->
                    </ul>
                </div>
                <div class="subcategory">
                    <h3>Specialty</h3>
                    <ul id="specialty-business-cards">
                        <!-- JavaScript will populate this list -->
                    </ul>
                </div>
            </div>
        </section>

        <!-- Repeat similar sections for other categories -->
    </main>

    <script src="script.js"></script>
</body>
</html>
