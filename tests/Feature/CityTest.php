<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\City;

class CityTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET', 'cities');
        
        $this->assertEquals(200, $response->status());
    }
    
    public function testCreate() {
        $response = $this->call('GET', 'cities/create');
        
        $this->assertEquals(200, $response->status());
    }
    
    public function testStore() {
        $beforeCount = City::count();
        $this->withoutMiddleware();
        $response = $this->call('POST', 'cities/create', array('name' => 'Test'));
        
        $this->assertEquals(302, $response->status());
        
        $afterCount = City::count();
        
        if($afterCount == $beforeCount) {
            $this->assertTrue(false);
        }
    }
    
    public function testEdit() {
        $city = City::first();
        if ($city != null) { 
            $response = $this->call('GET', 'cities/'.$city->id.'/edit');

            $this->assertEquals(200, $response->status());
        } else {
            $this->assertTrue(true);
        }
    }
    
    public function testUpdate() {
        $this->withoutMiddleware();
        $city = City::first();
        if ($city != null) { 
            $response = $this->call('PUT', 'cities/'.$city->id.'/edit', array('name' => 'Test2'));

            $this->assertEquals(302, $response->status());

            $city = City::where('name', 'Test2')->count();

            if($city != 1) {
                $this->assertTrue(false);
            } 
        } else {
            $this->assertTrue(true);
        }
    }
    
    public function testDelete() {
        $this->withoutMiddleware();
        $city = City::first();
        
        if ($city != null) {
            $city->delete();
            $anotherCityOrNull = City::first();
            if ($anotherCityOrNull != null) {
                if ($anotherCityOrNull->id == $city->id) {
                    $this->assertTrue(false);
                } else {
                    $this->assertTrue(true);
                }
            }
        } else {
            $this->assertTrue(true);
        }
    }
}
