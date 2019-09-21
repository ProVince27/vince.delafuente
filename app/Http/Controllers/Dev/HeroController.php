<?php

namespace App\Http\Controllers\Dev;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroController extends Controller {

    public function index(Request $request){
        
        return view('shared.layouts.app');
    }
}
