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
        // 1. Clear existing products
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        $categoryIds = DB::table('categories')->pluck('id')->all();
        $brandIds = DB::table('brands')->pluck('id')->all();

        if (empty($categoryIds) || empty($brandIds)) {
            // If no categories or brands exist, we can't create products strictly linked to them.
            // But usually seeders run in order.
            return;
        }

        // 2. Define Fruits
        $fruits = [
            ['name' => 'Manzana Roja', 'image' => 'assets/images/fruit/product/1.png'],
            ['name' => 'Banana Ecuador', 'image' => 'assets/images/fruit/product/2.png'],
            ['name' => 'Naranja Jugo', 'image' => 'assets/images/fruit/product/3.png'],
            ['name' => 'Pera Williams', 'image' => 'assets/images/fruit/product/4.png'],
            ['name' => 'Uva Negra', 'image' => 'assets/images/fruit/product/5.png'],
            ['name' => 'Frutilla', 'image' => 'assets/images/fruit/product/6.png'],
        ];

        // 3. Define Vegetables
        $vegetables = [
            ['name' => 'Tomate Redondo', 'image' => 'assets/images/vegetable/product/1.png'],
            ['name' => 'Lechuga Criolla', 'image' => 'assets/images/vegetable/product/2.png'],
            ['name' => 'Zanahoria', 'image' => 'assets/images/vegetable/product/3.png'],
            ['name' => 'Papa Negra', 'image' => 'assets/images/vegetable/product/4.png'],
            ['name' => 'Cebolla Morada', 'image' => 'assets/images/vegetable/product/5.png'],
            ['name' => 'Pimiento Rojo', 'image' => 'assets/images/vegetable/product/6.png'],
            ['name' => 'Pepino', 'image' => 'assets/images/vegetable/product/7.png'],
            ['name' => 'Espinaca', 'image' => 'assets/images/vegetable/product/8.png'],
            ['name' => 'Brócoli', 'image' => 'assets/images/vegetable/product/9.png'],
            ['name' => 'Coliflor', 'image' => 'assets/images/vegetable/product/10.png'],
            ['name' => 'Zapallo Anco', 'image' => 'assets/images/vegetable/product/11.png'],
            ['name' => 'Berenjena', 'image' => 'assets/images/vegetable/product/12.png'],
            ['name' => 'Zucchini', 'image' => 'assets/images/vegetable/product/13.png'],
            ['name' => 'Remolacha', 'image' => 'assets/images/vegetable/product/14.png'],
            ['name' => 'Acelga', 'image' => 'assets/images/vegetable/product/15.png'],
            ['name' => 'Choclo', 'image' => 'assets/images/vegetable/product/16.png'],
            ['name' => 'Batata', 'image' => 'assets/images/vegetable/product/17.png'],
            ['name' => 'Repollo Blanco', 'image' => 'assets/images/vegetable/product/18.png'],
            ['name' => 'Repollo Colorado', 'image' => 'assets/images/vegetable/product/19.png'],
            ['name' => 'Apio', 'image' => 'assets/images/vegetable/product/20.png'],
            ['name' => 'Puerro', 'image' => 'assets/images/vegetable/product/21.png'],
            ['name' => 'Verdeo', 'image' => 'assets/images/vegetable/product/22.png'],
            ['name' => 'Ajo', 'image' => 'assets/images/vegetable/product/23.png'],
            ['name' => 'Perejil', 'image' => 'assets/images/vegetable/product/24.png'],
            ['name' => 'Albahaca', 'image' => 'assets/images/vegetable/product/25.png'],
            ['name' => 'Rúcula', 'image' => 'assets/images/vegetable/product/26.png'],
        ];

        $allProducts = array_merge($fruits, $vegetables);
        $rows = [];

        foreach ($allProducts as $product) {
            // Price between 500 and 5000 (Argentine DB)
            $price = $faker->randomFloat(2, 500, 5000);
            $price2 = $price - 1;

            $rows[] = [
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'brand_id' => $brandIds[array_rand($brandIds)],
                'name' => $product['name'],
                'slug' => Str::slug($product['name'] . '-' . Str::uuid()),
                'description' => "Descripción de " . $product['name'],
                'price' => $price,
                'price_2' => $price2 > 0 ? $price2 : $price,
                'stock' => $faker->numberBetween(10, 100),
                'image' => $product['image'],
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($rows, 50) as $chunk) {
            DB::table('products')->insert($chunk);
        }
    }
}
