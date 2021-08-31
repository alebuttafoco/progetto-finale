<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'customer_lastname', 'customer_address', 'status', 'date', 'total_price'];
}