<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Sort extends Controller
{
    //
    public function sortbyName()
    {

        $time = now()->addMinutes(10);
        $products = Products::orderBy("name", 'asc')->get();

        session()->flash('Status-success', 'Sorted by name!');

        // dd($products);
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
    public function sortbyType()
    {

        $time = now()->addMinutes(10);
        $products = Products::orderBy("type", 'asc')->get();


        // dd($products);
        session()->flash('Status-success', 'Sorted by type!');
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
    public function sortbyManufacturer()
    {

        $time = now()->addMinutes(10);
        $products = Products::orderBy("manufacturer", 'asc')->get();


        session()->flash('Status-success', 'Sorted by manufacturer!');
        // dd($products);
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
    public function sortbySales()
    {

        $time = now()->addMinutes(10);
        $products = Products::orderBy("sales", 'desc')->get();


        session()->flash('Status-success', 'Sorted by number of sales!');

        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
    public function sortbyPrice_range()
    {


        $time = now()->addMinutes(10);
        $products = Products::orderBy("price_range", 'desc')->get();

        session()->flash('Status-success', 'Sorted by Price!');

        // dd($products);
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
}
