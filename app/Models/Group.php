<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function campaign()
    {
        return $this->hasOne(Campaign::class);
    }
}
