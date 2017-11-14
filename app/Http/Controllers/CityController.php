<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Artisan;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        
        return view('cities.index', compact('cities'));
    }
    
    public function create() 
    {
        
        return view('cities.form');
    }
    
    public function edit($id) 
    {
        $city = City::find($id);
        
        return view('cities.form', compact('city'));
    }
    
    public function store(Request $request, $id = null) 
    {
        $this->validate($request, array('name' => 'required'));
        
        if ($id != null) {
            $city = City::find($id);
        } else {
            $city = new City;
        }
        $city->name = $request->get('name');
        
        if ($city->save()) {
            Artisan::call('getWeatherFrom:Onet', []);
            return redirect()->route('cities.index')->withSuccess('Pomyślnie '.($id == null ? 'dodano' : 'edytowano').' miasto.');
        }
        
        return redirect()->route('cities.index')->withErrors('Wystąpił błąd podczas '.($id == null ? 'dodawania' : 'edycji').' miasta! Spróbuj ponownie.');
    }
    
    public function delete($id) 
    {
        if (City::find($id)->delete()) {
            
            return redirect()->route('cities.index')->withSuccess('Pomyślnie usunięto miasto.');
        }
        
        return redirect()->route('cities.index')->withErrors('Wystąpił błąd podczas usuwania miasta! Spróbuj ponownie.');
    }
}
