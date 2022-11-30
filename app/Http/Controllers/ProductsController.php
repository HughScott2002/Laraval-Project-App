<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducts;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Image;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
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
    // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cache::flush();
        $typeSort = session('sort');
        $time = now()->addMinutes(10);
        if ($typeSort == "name") {
            $products = Cache::tags(['products'])->remember('products', $time, function () {
                // return Products::latestWithRelations()->get();
                return Products::orderByName()->get();
            });
            dd("works");

            return view(
                "products.index",
                [
                    'products' => $products,
                ]
            );
        }

        $products = Cache::tags(['products'])->remember('products', $time, function () {
            // return Products::latestWithRelations()->get();
            return Products::all();
        });

        // dd($products);
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }
    public function sortbyName()
    {
        $time = now()->addMinutes(10);

        $products = Cache::tags(['products'])->remember('products', $time, function () {
            // return Products::latestWithRelations()->get();
            return Products::orderByName()->get();
        });
        return view(
            "products.sortByName",
            [
                'products' => $products,
            ]
        );
        // dd($products);
        return view(
            "products.index",
            [
                'products' => $products,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(StoreProducts $request)
    {
        //
        // dd($request->hasFile('thumbnail'));
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        // dd($validated);
        $product = Products::create([
            "name" => $validated['name'],
            "type" => $validated['type'],
            "manufacturer" => $validated['manufacturer'],
            "price_range" => $validated['price_range'],
            "user_id" => $validated['user_id'],
            "discount" => $validated['discount'],
            "quantity" => $validated['quantity'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            $product->image()->save(
                Image::create(['path' => $path])
            );
        }

        session()->flash("Status-success", 'The product was created!');
        return redirect()
            ->route('product.show', ['product' => $product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);
        // $product = Cache::tags(['product'])->remember("product-{$id}", 60, function () use ($id) {
        //     return Products::with('comments', 'tags', 'comments.user')
        //         ->findOrFail($id);
        $product = Products::with('user')->findOrFail($id);
        // dd($product);
        // return BlogPost::with('comments', 'tags', 'user', 'comments.user')
        // ->findOrFail($id)
        // ->with('tags')
        // ->with('user')
        // ->with('comments.user')
        // return BlogPost::with('comments', 'user')->findOrFail($id);
        // });

        $sessionId = session()->getId();
        $counterKey = "product-key-{$id}-counter";
        $usersKey = "product-key-{$id}-users";

        $users = Cache::tags(['product-key'])->get($usersKey, []);
        $usersUpdate = [];
        $difference = 0;
        $now = now();

        foreach ($users as $session => $lastVisit) {
            if ($now->diffInMinutes($lastVisit) >= 1) {
                $difference--;
            } else {
                $usersUpdate[$session] = $lastVisit;
            }
        }
        if (!array_key_exists($sessionId, $users) || $now->diffInMinutes($users[$sessionId]) >= 1) {
            $difference++;
        }
        $usersUpdate[$sessionId] = $now;

        Cache::tags(['product'])->put($usersKey, $usersUpdate);

        if (!Cache::tags(['product'])->has($counterKey)) {
            Cache::tags(['product'])->forever($counterKey, 1);
        } else {
            Cache::tags(['product'])->increment($counterKey, $difference);
        }

        $counter = Cache::tags(['product'])->get($counterKey);

        $id_user = auth()->user()->id ?? 0;
        // $id_user = auth()->user()->id;
        // dd($id_user);
        // dd(User::find($id_user));

        //if the id is 0 then there will be no user found output will be null
        return view(
            'products.show',
            [
                'product' => $product,
                'counter' => $counter,
                'user' => User::find($id_user),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('products.edit', ['product' => Products::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProducts $request, $id)
    {

        // dd("this is going here");
        //add quantity
        $product = Products::findOrFail($id);

        // if (Gate::denies('update-product', $product)) {
        //     abort(403);
        // }
        // $this->authorize('update', $product);

        $validated = $request->validated();

        $product->fill($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            if ($product->image) {
                Storage::delete($product->image->path);
                $product->image->path = $path;
                $product->image->save();
            } else {
                $product->image()->save(
                    Image::create(['path' => $path])
                );
            }
            $product->image()->save(
                Image::create(['path' => $path])
            );
        }

        $product->save();


        session()->flash("Status-success", "Your Product Has been updated");

        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $product = Products::findOrFail($id);
        // if (Gate::denies('delete-product', $product)) {
        //     abort(403);
        // }
        // $this->authorize('delete', $product);

        $product->delete();

        session()->flash('Status-success', 'Product was deleted!');

        return redirect()->route('product.index');
    }
}
