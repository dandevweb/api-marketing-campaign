<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function discounts()
    {
        return $this->belongsToMany(
            Discount::class,
            Discount::RELATIONSHIP_PRODUCTS_DISCOUNTS,
            'product_id',
            'discount_id',
        );
    }
}
