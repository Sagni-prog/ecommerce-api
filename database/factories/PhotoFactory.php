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
        return [
            'photo_name' => $this->faker->word,
            'photo_path' => 'public/storage/images',
            'photo_url' => $this->faker->imageUrl('cats'),
            'height' => 400,
            'width' => 500

        ];
    }
}
