<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
