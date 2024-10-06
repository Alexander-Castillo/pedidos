<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    # definimos la estructura para los datos de prueba de la tabla "orders"
    public function definition(): array
    {
        return [
            'product' => fake()->name(), // generamos nombre de product
            'quantity' => fake()->numberBetween(1, 5), // generamos una cantidad aleatoria entre 1 y 5
            'total_amount' => fake()->randomFloat(2, 10.00, 100.00), // generamos un precio aleatorio entre 10.00 y 100.00
            'user_id' => User::factory(), // generamos el id_user con la foranea con la factory de User
        ];
    }
}
