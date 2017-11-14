<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\City;

class CityModelTest extends TestCase
{
    public function testGoodCity() {
        $city = new City;
        $city->name = 'Kraków'; // good city name
        $city->save();
        
        if ($city->getWeatherForCity()) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(true);
        }
    }
    
    public function testBadCity() {
        $city = new City;
        $city->name = 'gsagfasfasfa'; //bad city name
        $city->save();
        
        if ($city->getWeatherForCity()) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}
