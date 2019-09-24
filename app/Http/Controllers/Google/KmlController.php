<?php

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use Cache;
use File;
use Illuminate\Http\Request;

class KmlController extends Controller {

    protected $geoloc;

    public function __construct() {

    }

    public function index(Request $request) {

        $value = Cache::store('redis')->rememberForever('philippine_cities', function () {
            $geoloc = File::get(storage_path('app\\google\\philippine-city.json'));
            return collect(json_decode($geoloc, true)['features']);
        });

        try {
            $place = $value
                ->whereLike('properties.NAME_2', $request->city)
                ->first();
            if (!isset($place['geometry'])) {
                throw new \Exception('', 1);
            }
            $heatPoint = [];
            $locations = $place['geometry']['coordinates'][0][0];
            $colors    = [
                'red'    => [
                    'rgba(255, 0, 0, 0)',
                    'rgba(255, 0, 0, 1)'
                ],
                'green'  => [
                    'rgba(0, 255, 0, 0)',
                    'rgba(0, 255, 0, 1)'
                ],
                'yellow' => [
                    'rgba(255, 255, 0, 0)',
                    'rgba(255, 255, 0, 1)'
                ],
            ];
            foreach ($locations as $location) {
                array_push($heatPoint, [
                    'lat'=> (float) $location[1],
                    'lng' =>(float) $location[0],
                    'color' => $colors[array_rand($colors,1)],
                ]);
            }
            

            return $this->resolve('Successfully found', $heatPoint);
        } catch (\Exception $e) {
            
            return $this->reject($e->getMessage(), 404);
        }
    }
}
