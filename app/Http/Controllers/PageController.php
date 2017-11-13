<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class PageController extends Controller
{
    public function index() 
    {
        $cities = City::all();
        
        return view('pages.home', compact('cities'));
    }
}
