<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    // Define the relationship to the Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
