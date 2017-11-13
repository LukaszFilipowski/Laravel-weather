<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherParam extends Model
{
    protected $fillable = [
        'label', 'value', 'weather_id', 
    ];
    
    protected $table = 'weather_params';
    protected $primaryKey = 'id';
    
    public function weather() 
    {
        
        return $this->belongsTo('App\Weather');
    }
}
