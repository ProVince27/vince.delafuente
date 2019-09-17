<?php

namespace App\Http\Controllers\Google;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Cache;

class KmlController extends Controller {

    protected $geoloc;

    public function __construct(){


    }
    
    public function index(Request $request) {
        
        

        $value = Cache::store('redis')->rememberForever('philippine_cities',function () {
            $geoloc = File::get(storage_path('app\\google\\philippine-city.json'));
            return collect(json_decode($geoloc,true)['features']);
        });
        
        try {
            $place = $value
                // ->whereLike('properties.NAME_1',$request->state)
                ->whereLike('properties.NAME_2',$request->city)
                ->first();
            if(!isset($place['geometry'])){
                throw new \Exception('', 1);
            }
            return $this->resolve('Successfully found',$place['geometry']['coordinates'][0][0]);  
        } catch (\Exception $e) {
            return $this->reject('Failed to find location',404);
        }       
    }
}
