<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'n', 
        'start', 
        'end', 
        'date', 
    ]; 
}
