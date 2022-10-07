<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['discount_id','name', 'price'];

    public function campaigns()
    {
        return $this->belongsToMany(
            Campaign::class,
            Campaign::RELATIONSHIP_PRODUCTS_CAMPAIGNS,
            'campaign_id',
            'product_id'
        );
    }
}
