<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_lastname',
        'customer_address',
        'status', 'date',
        'total_price'
        ];

    public function plates() :BelongsToMany
    {
        return $this->belongsToMany(Plate::class)->withPivot('quantity');
    }
}