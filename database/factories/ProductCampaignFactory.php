<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCampaign>
 */
class ProductCampaignFactory extends Factory
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
            'campaign_id' => fake()->randomElement(Campaign::all()->pluck('id')->toArray()),
        ];
    }
}
