<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];
    
    protected $table = 'cities';
    protected $primaryKey = 'id';
}
