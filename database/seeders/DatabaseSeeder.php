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

        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Photo::factory(10)->create();

        \App\Models\Order::factory(3)->create();
        \App\Models\orderProduct::factory(3)->create();

        \App\Models\Catagory::factory()->create(
           [
            'catagory_name' => 'Bags',
           ]
        );

    }
}
