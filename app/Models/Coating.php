<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coating extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['name', 'description'];  // Adjust based on your table columns

    // Define the many-to-many relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_coating');
    }
}
