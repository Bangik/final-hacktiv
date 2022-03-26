<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => $this->faker->numberBetween(1, 10),
            'product_id' => $this->faker->numberBetween(1, 10),
            'qty' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
