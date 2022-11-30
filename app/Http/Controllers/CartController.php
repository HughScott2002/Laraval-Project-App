<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {

            $carts = Cart::where('user_id', '=', auth()->user()->id)->get();
            // dd($carts);
            foreach ($carts as $cart) {
                $product = Products::find($cart->product_id);
                $cart->name = $product->name;
                $cart->type = $product->type;
                $cart->manufacturer = $product->manufacturer;
                $cart->price = $product->price_range;
            }
            // dd($carts);
            return view("cart.index", [
                "carts" => $carts,
            ]);
        } else {
            // return redirect()->route('login');
            return view("cart.index", [
                "carts" => null,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
        // dd($request['user_id']);
        if ($request['user_id'] == null) {
            return view('login');
        }
        // $validated = $request->validated();
        // $validated['user_id'] = $request->user()->id;
        Cart::create([
            "user_id" => $request["user_id"],
            "product_id" => $request["product_id"],
            "quantity" => $request["quantity"]
        ]);

        // if ($request->hasFile('thumbnail')) {
        //     $path = $request->file('thumbnail')->store('thumbnails');
        //     $product->image()->save(
        //         Image::create(['path' => $path])
        //     );
        // }

        session()->flash("Status-success", 'Added to Cart');
        return redirect()
            ->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        // dd($cart);
        $id = $cart->id;
        //
        // dd($id);
        $cart = Cart::findOrFail($id);
        // if (Gate::denies('delete-cart', $cart)) {
        //     abort(403);
        // }
        // $this->authorize('delete', $cart);

        $cart->delete();

        session()->flash('Status-success', 'Deleted from cart!');

        return redirect()->route('cart.index');
    }
}
