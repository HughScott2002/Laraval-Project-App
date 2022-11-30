<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Products;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCount = Tag::all()->count();

        if (0 === $tagCount) {
            $this->command->info('No tags found, skipping assigning tags to blog posts');
            return;
        }

        // $howManyMin = (int)$this->command->ask("Minimum tags on blog post?");
        // $howManyMin = 1;
        // $howManyMax = 1;
        // $howManyMax = min((int)$this->command->ask("Maximum tags on blog post?", $tagCount), $tagCount);
        BlogPost::all()->each(function (BlogPost $post) {
            // $take = random_int($howManyMin, $howManyMax);
            // $take = 1;
            $tags = Tag::inRandomOrder()->take(1)->get()->pluck('id');
            $post->tags()->sync($tags);
        });
    }
}
