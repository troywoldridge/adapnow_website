<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grommet extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['name'];  // Adjust this based on your grommet table fields

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_grommet');
    }
}
