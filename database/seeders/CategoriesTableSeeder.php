<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();

        // Por ejemplo, 15 categorías de prueba
        for ($i = 0; $i < 15; $i++) {
            $name = $faker->unique()->words(2, true); // ej: "Electro Hogar"

            Category::create([
                'name'        => ucfirst($name),
                'slug'        => Str::slug($name . '-' . $i),
                'description' => $faker->sentence(10),
            ]);
        }    
    }
}
