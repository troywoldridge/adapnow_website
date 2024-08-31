<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relationship with Size
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    // Relationship with Stock
    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'product_stock');
    }

    // Relationship with Quantity
    public function quantities()
    {
        return $this->belongsToMany(Quantity::class, 'product_quantity');
    }

    // Relationship with Grommet
    public function grommets()
    {
        return $this->belongsToMany(Grommet::class, 'product_grommet');
    }

    // Relationship with HStand
    public function hstands()
    {
        return $this->belongsToMany(HStand::class, 'product_hstand');
    }

    // Relationship with Coating
    public function coatings()
    {
        return $this->belongsToMany(Coating::class, 'product_coating');
    }

    // Relationship with Turnaround
    public function turnarounds()
    {
        return $this->belongsToMany(Turnaround::class, 'product_turnaround');
    }

    // Relationship with Set
    public function sets()
    {
        return $this->belongsToMany(Set::class, 'product_set');
    }

    // Relationship with Compatibility
    public function compatibilities()
    {
        return $this->belongsToMany(Compatibility::class, 'product_compatibility');
    }
public function subcategory()
{
    return $this->belongsTo(Subcategory::class);
}

}
