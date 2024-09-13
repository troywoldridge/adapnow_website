#!/bin/bash

# Define the directory where the product files will go
DIRECTORY="/home/troy/adap_now-website/resources/views/products/"

# Create the directory if it doesn't exist
mkdir -p "$DIRECTORY"

# Path to your SQLite database
DB_PATH="/home/troy/adap_now-website/database/database.sqlite"

# Pull the product names and slugs from the SQLite database using sqlite3
products=$(sqlite3 "$DB_PATH" "SELECT name, slug FROM products;")

# Loop through the products and create the corresponding file
IFS=$'\n' # Set Internal Field Separator to newline
for product in $products
do
    # Split the product name and slug
    name=$(echo $product | cut -d '|' -f 1)
    slug=$(echo $product | cut -d '|' -f 2)

    # Create the file with a basic structure
    echo "<!-- Product File for $name -->
@extends('layouts.main')

@section('content')
<div class='container'>
 <h1>$name</h1>
 <p>Details about $name go here.</p>
</div>
@endsection" > "${DIRECTORY}${slug}.blade.php"
done

echo "Files created successfully!"
