<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'coin' => fake()->randomElement(Order::$coins),
            'type' => fake()->randomElement(Order::$type),
            'amount' => fake()->numberBetween(1,100),
            'price' => fake()->numberBetween(100, 1_000),
        ];
    }
}
