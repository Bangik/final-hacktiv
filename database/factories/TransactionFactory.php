<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->numberBetween(100, 1000000),
            'status' => $this->faker->randomElement(['pending', 'success', 'failed', 'process', 'send']),
            'payment_url' => $this->faker->url,
        ];
    }
}
