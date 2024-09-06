<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Mass assignment protection
    protected $fillable = ['name', 'slug', 'description']; // Adjust based on your table fields
    
    // If you don't have created_at or updated_at in your categories table
    public $timestamps = false;

    // Define the relationship to the Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Define the relationship to the Subcategory model
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
