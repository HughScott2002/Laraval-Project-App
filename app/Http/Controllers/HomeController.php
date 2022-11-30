<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view(
            "home.index"
        );
        // return view('home.index');
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
