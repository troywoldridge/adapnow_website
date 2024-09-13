<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'name', 'option', 'sku', 'price', 'stock'
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with Product Stock (if each variant has individual stock)
    public function stock()
    {
        return $this->hasOne(ProductStock::class, 'variant_id');
    }
}
