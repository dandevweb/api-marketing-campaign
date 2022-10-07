<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'name'];

    public function group()
    {
        return $this->hasOne(Group::class);
    }
}
