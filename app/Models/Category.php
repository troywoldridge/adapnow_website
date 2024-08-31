<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define the relationship to the Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }
public function subcategories()
{
    return $this->hasMany(Subcategory::class);
}
}
