<?php

namespace App\Http\Controllers;

use App\City;

class PageController extends Controller
{
    public function index() 
    {
        $cities = City::all();
        
        return view('pages.home', compact('cities'));
    }
    
    public function city($id) {
        $city = City::find($id);
        
        return view('pages.city', compact('city'));
    }
}
