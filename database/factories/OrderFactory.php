<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1, 4),
            'billing_firstname'=>$this->faker->name,
            'billing_lastname'=>$this->faker->name,
            'billing_email'=>$this->faker->safeEmail,
            'billing_country'=>$this->faker->countryCode,
            'billing_city'=>$this->faker->countryCode,
            'billing_address_line1'=>$this->faker->countryCode,
            'billing_address_line2'=>$this->faker->countryCode,
            'billing_total'=>$this->faker->randomDigit,
            'billing_payment_gateway'=>$this->faker->randomDigit,
            'billing_payment_status'=>$this->faker->randomElement([true,false]),
            'billing_payment_shipment_status'=>$this->faker->randomElement([true,false]),
            'billing_error'=>$this->faker->randomElement([true,false]),
        ];
    }
}
