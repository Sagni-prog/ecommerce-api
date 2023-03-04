<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Photo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $product_id = mt_rand(1,1000);
        return [
            'product_id' => $product_id,
            'photo_name' => $this->faker->word,
            'photo_path' => 'public/storage/images',
            'photo_url' =>  $this->faker->imageUrl(400, 500, 'cats'),
            'height' => 400,
            'width' => 500

        ];
    }
}
