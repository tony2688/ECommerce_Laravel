<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = DB::table('categories')->pluck('id')->all();
        $brandIds = DB::table('brands')->pluck('id')->all();

        if (empty($categoryIds) || empty($brandIds)) {
            return;
        }

        $rows = [];
        for ($i = 0; $i < 1000; $i++) {
            $name = ucfirst($faker->unique()->words(3, true));
            $rows[] = [
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'brand_id' => $brandIds[array_rand($brandIds)],
                'name' => $name,
                'slug' => Str::slug($name.'-'.Str::uuid()),
                'description' => $faker->optional()->paragraphs(2, true),
                'price' => $faker->randomFloat(2, 5, 2000),
                'stock' => $faker->numberBetween(0, 500),
                'image' => $faker->optional()->imageUrl(640, 480, 'product', true),
                'status' => $faker->boolean(80) ? 'active' : 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($rows, 250) as $chunk) {
            DB::table('products')->insert($chunk);
        }
    }
}
