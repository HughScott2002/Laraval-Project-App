<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nameArray = [
            "Iphone",
            "Ipad",
            "Samsung Gear",
            "Samsung Galaxy",
            "Visio",
            "Bisio",
        ];

        $name = $this->faker->randomElement($nameArray);

        switch ($name) {
            case "Iphone":
                $type = "Phone";
                $man = "Apple";
                break;
            case "Ipad":
                $type = "Tablet";
                $man = "Apple";
                break;
            case "Samsung Gear":
                $type = "Watch";
                $man = "Samsung";
                break;
            case "Samsung Galaxy":
                $type = "Phone";
                $man = "Samsung";
                break;
            case "Visio":
                $type = "TV";
                $man = "Visio";
                break;
            case "Bisio":
                $type = "TV";
                $man = "Visio";
                break;
            default:
                $type = "Error";
                $man = "Error";
                break;
        }

        $priceRange = random_int(99, 9999) / random_int(1, 10);
        return [
            'name' => $name,
            'type' => $type,
            'manufacturer' => $man,
            'sales' => random_int(1, 400),
            'price_range' => $priceRange,
            'quantity' => random_int(500, 999),
            'discount' => random_int(1, 10) / random_int(1, 3),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
