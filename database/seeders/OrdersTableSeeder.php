<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->all();
        $products = DB::table('products')->select('id', 'price')->get()->all();

        if (empty($userIds) || empty($products)) {
            return;
        }

        $existing = (int) DB::table('orders')->count();
        $toCreate = max(0, 50 - $existing);

        for ($i = 0; $i < $toCreate; $i++) {
            DB::transaction(function () use ($userIds, $products) {
                $userId = $userIds[array_rand($userIds)];
                $statusPool = ['pending', 'paid', 'shipped', 'cancelled'];
                $status = $statusPool[array_rand($statusPool)];

                $orderId = DB::table('orders')->insertGetId([
                    'user_id' => $userId,
                    'total_price' => 0,
                    'status' => $status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $itemsCount = random_int(1, 8);
                $total = 0.0;

                $pickedIndexes = array_rand($products, min($itemsCount, count($products)));
                $pickedIndexes = is_array($pickedIndexes) ? $pickedIndexes : [$pickedIndexes];

                foreach ($pickedIndexes as $idx) {
                    $product = $products[$idx];
                    $qty = random_int(1, 5);
                    $price = (float) $product->price;
                    $subtotal = $price * $qty;
                    $total += $subtotal;

                    DB::table('order_items')->insert([
                        'order_id' => $orderId,
                        'product_id' => $product->id,
                        'quantity' => $qty,
                        'price' => $price,
                        'subtotal' => $subtotal,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                DB::table('orders')->where('id', $orderId)->update([
                    'total_price' => $total,
                    'updated_at' => now(),
                ]);
            });
        }
    }
}
