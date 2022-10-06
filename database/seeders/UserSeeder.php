<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Danilo Augusto',
            'email' => 'dandevweb@gmail.com',
            'password' => bcrypt('Password1'),

        ]);

        User::factory(2)->create();
    }
}