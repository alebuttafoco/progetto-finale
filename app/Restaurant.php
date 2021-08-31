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

    /**
     * The categories that belong to the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
