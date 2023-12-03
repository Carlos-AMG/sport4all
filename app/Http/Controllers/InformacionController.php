<?php

namespace App\Http\Controllers;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    public function index(){
        return view('informacion/index_informacion');
    }
    public function aboutUs(){
        return view('informacion/aboutUs_informacion');
    }
    public function contactUs(){
        return view('informacion/contactUs_informacion');
    }
}
