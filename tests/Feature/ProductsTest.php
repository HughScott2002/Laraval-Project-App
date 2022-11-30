<?php

namespace Tests\Feature;

use App\Models\Products;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $tagCount = Tag::all()->count();

        if (0 === $tagCount) {
            $this->command->info('No tags found, skipping assigning tags to blog posts');
            return;
        }

        // $howManyMin = (int)$this->command->ask("Minimum tags on blog post?");
        // $howManyMin = 1;
        // $howManyMax = 1;
        // $howManyMax = min((int)$this->command->ask("Maximum tags on blog post?", $tagCount), $tagCount);
        Products::all();
        Products::all()->each(function (Products $product) {
            // $take = random_int($howManyMin, $howManyMax);
            // $take = 1;
            $tags = Tag::inRandomOrder()->take(1)->get()->pluck('id');

            dd($tags);
            $product->tags()->sync($tags);
        });

        $response->assertStatus(200);
    }
}
