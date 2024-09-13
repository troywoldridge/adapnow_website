<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id']; // Ensure parent_id is fillable

    // Define the relationship between categories and products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Define the self-referencing relationship for subcategories
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Define the inverse relationship to find the parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}

