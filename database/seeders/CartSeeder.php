<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $products = Products::all();
        Cart::factory()
            ->count(100)
            ->make()
            ->each(function ($cart) use ($users, $products) {
                $cart->product_id = $products->random()->id;
                $cart->user_id = $users->random()->id;
                $cart->save();
            });
    }
}
