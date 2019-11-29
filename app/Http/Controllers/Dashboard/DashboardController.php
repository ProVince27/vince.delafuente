<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    
    public function index(Request $request){
        // dd($request->headers);
        return view('app.dashboard.dashboard-admin.dashboard-admin');
    }
}
