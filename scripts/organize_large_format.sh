#!/bin/bash

BASE_DIR="resources/views/products/large-format"

# Create subfolders
mkdir -p "$BASE_DIR/coroplast"
mkdir -p "$BASE_DIR/banners"
mkdir -p "$BASE_DIR/table-covers"
mkdir -p "$BASE_DIR/floor-graphics"
mkdir -p "$BASE_DIR/display-board"
mkdir -p "$BASE_DIR/canvas"

# Move coroplast files
mv "$BASE_DIR/10mm-coroplast" "$BASE_DIR/coroplast/"
mv "$BASE_DIR/6mm-coroplast" "$BASE_DIR/coroplast/"
mv "$BASE_DIR/8mm-coroplast" "$BASE_DIR/coroplast/"
mv "$BASE_DIR/a-frame-signs-4mm-coroplast" "$BASE_DIR/coroplast/"
mv "$BASE_DIR/coroplast-4mm" "$BASE_DIR/coroplast/"

# Move banner files
mv "$BASE_DIR/banners-13oz-glossy-vinyl" "$BASE_DIR/banners/"
mv "$BASE_DIR/banners-13oz-matte-vinyl" "$BASE_DIR/banners/"
mv "$BASE_DIR/pull-up-banners-13oz-matte-vinyl-black" "$BASE_DIR/banners/"
mv "$BASE_DIR/pull-up-banners-13oz-matte-vinyl-silver" "$BASE_DIR/banners/"
mv "$BASE_DIR/premium-stand-13oz-matte-vinyl" "$BASE_DIR/banners/"
mv "$BASE_DIR/premium-wide-13oz-matte-vinyl" "$BASE_DIR/banners/"
mv "$BASE_DIR/x-frame-banners-13oz-matte-vinyl" "$BASE_DIR/banners/"

# Move table covers files
mv "$BASE_DIR/table-covers-6ft" "$BASE_DIR/table-covers/"
mv "$BASE_DIR/table-covers-8ft" "$BASE_DIR/table-covers/"
mv "$BASE_DIR/table-top-13oz-matte-vinyl" "$BASE_DIR/table-covers/"

# Move floor graphics files
mv "$BASE_DIR/floor-graphics" "$BASE_DIR/floor-graphics/"
mv "$BASE_DIR/social-distancing-floor-graphics" "$BASE_DIR/floor-graphics/"

# Move display board files
mv "$BASE_DIR/display-board-24pt" "$BASE_DIR/display-board/"
mv "$BASE_DIR/display-board-40pt" "$BASE_DIR/display-board/"

# Move canvas files
mv "$BASE_DIR/stretched-canvas-prints" "$BASE_DIR/canvas/"
mv "$BASE_DIR/canvas-roll" "$BASE_DIR/canvas/"

# Notify completion
echo "Directories have been moved and organized!"
