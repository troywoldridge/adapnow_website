<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['name'];  // Adjust according to your quantity table fields

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_quantity');
    }
}
