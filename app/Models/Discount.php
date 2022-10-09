<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value'];

    public const RELATIONSHIP_PRODUCTS_DISCOUNTS = 'products_discounts';

    public function products()
    {
        return $this->belongsToMany(Product::class, self::RELATIONSHIP_PRODUCTS_DISCOUNTS, 'discount_id');
    }
}