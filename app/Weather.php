<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'temp', 'feel_temp', 'forecast', 'city_id',
    ];
    
    protected $table = 'weathers';
    protected $primaryKey = 'id';
    
    public function city() {
        
        return $this->belongsTo('App\City');
    }
    
    public function params() {
        
        return $this->hasMany('App\WeatherParam');
    }
}
