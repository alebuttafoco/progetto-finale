<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'address',
        'cap',
        'city',
        'description',
        'piva',
    ];

    public function plates(){
        return $this->hasMany('App\Plate');
    }
}
