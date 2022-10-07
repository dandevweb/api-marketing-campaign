<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public const RELATIONSHIP_PRODUCTS_CAMPAIGNS = 'products_campaigns';

    public function products()
    {
        return $this->belongsToMany(Product::class, self::RELATIONSHIP_PRODUCTS_CAMPAIGNS, 'campaign_id');
    }
}
