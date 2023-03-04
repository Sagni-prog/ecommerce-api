<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modles\Catagory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catagory>
 */
class CatagoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'catagory_name' => $this->faker->randomElement([
                'Jacket',
                'Bag',
                'Accessorries',
                'Womens',
                'Mens',
                'Shoes'
            ]),
        ];
    }
}
