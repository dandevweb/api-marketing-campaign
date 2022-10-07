<?php

namespace Database\Factories;

use App\Models\Discount;
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
    public function definition()
    {
        return [
            'name' => 'Produto ' . fake()->word(),
            'price' => fake()->randomFloat(2, 50, 400),
            'discount_id' => fake()->randomElement(Discount::all()->pluck('id')->toArray()),
        ];
    }
}