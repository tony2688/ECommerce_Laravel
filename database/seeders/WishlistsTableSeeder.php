<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->all();
        $productIds = DB::table('products')->pluck('id')->all();

        if (empty($userIds) || empty($productIds)) {
            return;
        }

        foreach ($userIds as $userId) {
            $count = random_int(10, 20);
            $picked = array_rand($productIds, min($count, count($productIds)));
            $picked = is_array($picked) ? $picked : [$picked];

            foreach ($picked as $idx) {
                $pid = $productIds[$idx];
                DB::table('wishlists')->updateOrInsert(
                    ['user_id' => $userId, 'product_id' => $pid],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
