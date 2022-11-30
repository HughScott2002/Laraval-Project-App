<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BuyController extends Controller
{
    //
    // public function purchase(Request $products)
    // {
    //     # code...
    // }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function purchase(Request $request)
    {
        // dd($request);
        if (!Auth::check()) {
            return view('login');
        }
        $id = $request['product_id'];
        $cart_id = (int) $request['cart_id'];
        $amount = (int) $request['amount'];
        // dd($amount);
        $product = Products::findOrFail($id);
        $product->quantity -= $amount;
        $product->sales += $amount;
        $product->save();

        $cart = Cart::findOrFail($cart_id);
        // dd("here");
        // $this->authorize('delete', $cart);

        $cart->delete();

        session()->flash("Status-success", "Your your product has been purchased");
        Cache::flush();
        Invoice::create(['user_id' => auth()->user()->id, 'product_name' => $product->name, 'product_quantity' => $amount]);
        return view('cart.sale_record', ['product' => $product]);
    }
    // public function saleRecord()
    // {
    //     return view('cart.sale_record', ['product' => $product]);
    // }
}
