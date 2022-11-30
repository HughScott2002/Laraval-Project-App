<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'quantity' => random_int(1, 10), // Add the title
            // 'content' => $this->faker->realText($maxNbChars = 900, $indexSize = 2),
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
