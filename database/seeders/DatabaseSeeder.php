<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(1000)->create();
        // \App\Models\Product::factory(1000)->create();
        // \App\Models\Photo::factory(1000)->create();

        // \App\Models\Order::factory(50)->create();
        // \App\Models\orderProduct::factory(100)->create();

        \App\Models\Catagory::factory()->create(
           [
            'catagory_name' => 'Bags',
           ]
        );
    }
}
