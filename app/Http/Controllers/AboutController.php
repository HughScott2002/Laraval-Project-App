<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function __invoke()
    {
        return "Single";
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function secret()
    {
        return view('home.secret');
    }
}
