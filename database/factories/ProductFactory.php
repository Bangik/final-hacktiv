<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 100),
            'massa' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['Draft', 'Aktif']),
        ];
    }
}
