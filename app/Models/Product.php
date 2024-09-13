<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id', 'subcategory_id', 'sku', 'description', 'price'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with Subcategory (still Category model)
    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    // Relationship with Product Variants
    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    // Relationship with Product Stock (if stock is tracked per product)
    public function stock()
    {
        return $this->hasOne(ProductStock::class, 'product_id');
    }

    // Relationship with Prices (if different pricing tiers or bulk pricing exist)
    public function prices()
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }

public function getImageAttribute()
{
    return $this->attributes['image'] ?? '/images/default-product.png'; // Default image path if not set
}
}