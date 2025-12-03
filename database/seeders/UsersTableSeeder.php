<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // ---------------------------
        // 1) ADMIN (idempotente)
        // ---------------------------
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('268801'),
                'phone' => $faker->phoneNumber(),
                'role' => 'admin',
                'address' => $faker->address(),
            ]
        );

        // ---------------------------
        // 2) 40 Usuarios Comunes
        // ---------------------------
        for ($i = 0; $i < 40; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'phone' => $faker->phoneNumber(),
                'role' => 'customer',
                'address' => $faker->address(),
            ]);
        }
    }
}
