<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Products</title>
</head>
<body>
    <h1>Products List</h1>

    @foreach($products as $product)
        <h2>{{ $product->name }}</h2>
        <p>Category: {{ $product->category->name }}</p>
        <p>Subcategory: {{ $product->subcategory->name ?? 'No Subcategory' }}</p>
        <hr>
    @endforeach
</body>
</html>
