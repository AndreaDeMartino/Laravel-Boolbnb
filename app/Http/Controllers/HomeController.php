<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class HomeController extends Controller
{
    public function index() 
    {
        $places = Place::latest('id', 'desc')->paginate(10);

        return view('guest.welcome', compact('places'));
    }
}
