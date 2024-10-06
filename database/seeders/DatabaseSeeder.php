<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //creacion de 10 registros falsos a la tabla user
        //User::factory(10)->create();
        //creando registros falsos para la tabla oders
        Orders::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
