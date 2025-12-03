<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->all();
        $productIds = DB::table('products')->pluck('id')->all();

        if (empty($userIds) || empty($productIds)) {
            return;
        }

        $rows = [];
        $pairs = [];
        $total = 300;

        for ($i = 0; $i < $total; $i++) {
            $uid = $userIds[array_rand($userIds)];
            $pid = $productIds[array_rand($productIds)];
            $key = $uid.'-'.$pid;
            if (isset($pairs[$key])) {
                continue;
            }
            $pairs[$key] = true;

            $rows[] = [
                'user_id' => $uid,
                'product_id' => $pid,
                'rating' => random_int(1, 5),
                'comment' => $faker->sentence(12),
            ];
        }

        foreach (array_chunk($rows, 250) as $chunk) {
            DB::table('reviews')->insert($chunk);
        }
    }
}
