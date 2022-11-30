<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::find(1) !== null) {
            User::factory()->count(20)->create();
        } else {
            User::factory()->state([
                'name' => 'Project Admin',
                'email' => 'admin@website.com',
                'email_verified_at' => now(),
                'password' => Hash::make('MoreandMore#789', [
                    'rounds' => 12,
                ]),
                'card' => Hash::make("1234_5678_9123_4567"),
                'remember_token' => Str::random(10),
                'is_admin' => true
            ])->count(1)->create();
            User::factory()->state([
                'name' => 'Not Admin',
                'email' => 'user@website.com',
                'email_verified_at' => now(),
                'password' => Hash::make('MoreandMore#789', [
                    'rounds' => 12,
                ]),
                'card' => Hash::make("1234_5678_9123_4567"),
                'remember_token' => Str::random(10),
                'is_admin' => false
            ])->count(1)->create();

            User::factory()->count(10)->create();
        }
        // User::factory()->state([
        //     'name' => 'Mary Jane Parker',
        //     'email' => 'maryJane@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password', [
        //         'rounds' => 12,
        //     ]),
        //     'remember_token' => Str::random(10),
        //     'is_admin' => true
        // ])->count(1)->create();

        // User::factory()->count(20)->create();
        // dd(get_class($jane), get_class($users));

    }
}
