<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;


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


    //  'TransectionDate' => $faker->date,
    //  'Amount' => $faker->randomDigit,
    //  'Description' => $faker->paragraph,

    // $faker->randomElement(['male', 'female']),
    // 'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
    public function definition()
    {

        $catagory_id = mt_rand(1, 4);
        $dis = mt_rand(5,50);
        return [
            'product_name' => $this->faker->name,
            'catagory_id' => $catagory_id,
            'photo_id' => 1,
            'price' => $this->faker->randomDigit,
            'description' => $this->faker->paragraph,
            'product_quantity' => 5,
            'features' => [
                  'size' => ['S','M','L','SL'][rand(0,3)],
                  'color' => ['Black','Red','Yellow','Gray'][rand(0,3)],
             ],
              'product_by_gender' =>  $this->faker->randomElement(['male', 'female']),
              'product_discount_percent' => $dis,
              'product_discount_start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
              'product_discount_end_date' => $this->faker->date($format = 'Y-m-d'),


        ];
    }
}
