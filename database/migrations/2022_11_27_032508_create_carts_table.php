<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('carts');
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            // $table->id();
            // $table->string('amount');
            $table->foreignId('product_id')
                ->constrained('products');
            // ->onDelete('cascade');
            $table->foreignId("user_id")
                ->default(0)
                ->constrained('users')
                ->onDelete('cascade');
            // $table->integer('amount');
            // $table->float('price_range');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
