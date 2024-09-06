<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['name'];  // Adjust according to your size table fields

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size');
    }
}
