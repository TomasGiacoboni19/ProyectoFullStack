<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function nosotros(){
        return view('nosotros',['carrito' => $this->carrito()]);
    }
    function locales()
    {
        return view('locales');
    }
}
