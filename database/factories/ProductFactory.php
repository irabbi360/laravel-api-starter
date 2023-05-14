<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'detail' => $this->faker->paragraph,
            'image' => 'products/'. $this->faker->image('public/storage/products', 600, 400, 'cats', false),
            'price' => $this->faker->numberBetween(500,5500),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(2,30),
            'user_id' => function() {
                return User::all()->random();
            }
        ];
    }
}
