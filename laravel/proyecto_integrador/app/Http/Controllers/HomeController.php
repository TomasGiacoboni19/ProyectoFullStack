<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function nosotros(){
        return view('nosotros');
    }
    function locales()
    {
        return view('locales');
    }
}
