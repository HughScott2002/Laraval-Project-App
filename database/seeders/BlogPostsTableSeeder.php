<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        BlogPost::factory()
            ->count(100)
            ->make()
            ->each(function ($post) use ($users) {
                $post->user_id = $users->random()->id;
                $post->save();
            });
    }
}
