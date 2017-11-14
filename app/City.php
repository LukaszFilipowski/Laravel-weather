<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\Weather;
use App\WeatherParam;

class City extends Model
{
    protected $fillable = [
        'name',
    ];
    
    protected $table = 'cities';
    protected $primaryKey = 'id';
    
    public function delete() 
    {
        foreach ($this->weathers as $weather) {
            foreach ($weather->params as $param) {
                $param->delete();
            }
            $weather->delete();
        }
        
        return parent::delete();
    }
    
    public function weathers() 
    {
        
        return $this->hasMany('App\Weather')->orderBy('created_at', 'desc');
    }
    
    public function getWeatherForCity() 
    {
        $client = new Client();
        $res = $client->get('https://pogoda.onet.pl/ajax/search?query='.$this->name);

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody());
  
            if (!isset($result->suggestions[0])) {
                
                return false;
            }
            
            $url = $result->suggestions[0]->data->url;
            $html = new \Htmldom('https://pogoda.onet.pl'.$url);
            $weatherBox = $html->find('div.mainBox')[0];
            
            $w = new Weather;
            $w->temp = $weatherBox->find('div.temp')[0]->plaintext;
            $w->feel_temp = $weatherBox->find('span[class="feelTempValue"]')[0]->plaintext;
            $w->forecast = $weatherBox->find('span.iconHolder img')[0].' '.$weatherBox->find('div.forecastDesc')[0]->plaintext;
            
            $this->weathers()->save($w);
            
            foreach ($weatherBox->find('div.weatherParams li') as $element) {
                $param = new WeatherParam;
                $param->label = $element->find('.restParamLabel')[0]->plaintext;
                $param->value = $element->find('.restParamValue')[0]->plaintext;
                $w->params()->save($param);
            }
        }
        
        return true;
    }
    
    public function getWeatherForCity() 
    {
        $client = new Client();
        $res = $client->get('https://pogoda.onet.pl/ajax/search?query='.$this->name);

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody());
  
            if (!isset($result->suggestions[0])) {
                
                return false;
            }
            
            $url = $result->suggestions[0]->data->url;
            $html = new \Htmldom('https://pogoda.onet.pl'.$url);
            $weatherBox = $html->find('div.mainBox')[0];
            
            $w = new Weather;
            $w->temp = $weatherBox->find('div.temp')[0]->plaintext;
            $w->feel_temp = $weatherBox->find('span[class="feelTempValue"]')[0]->plaintext;
            $w->forecast = $weatherBox->find('span.iconHolder img')[0].' '.$weatherBox->find('div.forecastDesc')[0]->plaintext;
            
            $this->weathers()->save($w);
            
            foreach ($weatherBox->find('div.weatherParams li') as $element) {
                $param = new WeatherParam;
                $param->label = $element->find('.restParamLabel')[0]->plaintext;
                $param->value = $element->find('.restParamValue')[0]->plaintext;
                $w->params()->save($param);
            }
        }
        
        return true;
    }
}
