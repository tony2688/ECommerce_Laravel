<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BrandsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $faker = Faker::create();

        $names = [
            'Apple', 'Samsung', 'Sony', 'LG', 'Nike', 'Adidas', 'Puma',
            'Dell', 'HP', 'Lenovo', 'Canon', 'Nikon', 'Bosch', 'Philips', 'Xiaomi',
        ];

        foreach ($names as $name) {
            $slug = Str::slug($name);

            DB::table('brands')->updateOrInsert(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'description' => $faker->sentence(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
