<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 
        'city', 
        'address', 
        'user_id', 
        'restaurant_id'
    ]; 

    public function users() {
        return $this->belongsToMany('App\User'); 
    }
}
