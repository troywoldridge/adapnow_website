<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['product_id', 'color'];  // Adjust according to your product color table fields
}
