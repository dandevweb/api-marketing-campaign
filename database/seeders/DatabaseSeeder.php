<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductCampaignSeeder::class);
    }
}