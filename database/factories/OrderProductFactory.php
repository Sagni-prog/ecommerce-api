<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\orderProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'order_id' => mt_rand(1,50),
            'quantity'=>$this->faker->randomDigit,
            'order_id'=>$this->faker->randomDigit
            //
        ];
    }
}
