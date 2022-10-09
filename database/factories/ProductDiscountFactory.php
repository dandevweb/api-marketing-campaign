<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDiscount>
 */
class ProductDiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->randomElement(Product::all()->pluck('id')->toArray()),
            'discount_id' => fake()->randomElement(Discount::all()->pluck('id')->toArray()),
        ];
    }
}