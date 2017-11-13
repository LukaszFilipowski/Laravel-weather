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
    
    public function weathers() {
        
        return $this->hasMany('App\Weather');
    }
}
