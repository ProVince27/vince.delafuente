<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller {
    public function index() {
        return view('app.media.media-index');
    }

    public function upload(Request $request) {

    }
}
