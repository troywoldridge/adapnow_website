<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compatibility extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['name'];  // Add any other fields you have in the compatibility table

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_compatibility');
    }
}
