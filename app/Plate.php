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
        'qty',
        'visible',
    ];

    public function orders() :BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}