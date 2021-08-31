<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plate extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'image',
        'description',
        'price',
        'type',
        'visible',
    ];

    public function orders() :BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}