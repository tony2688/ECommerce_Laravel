<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $orders = DB::table('orders')
            ->select('id', 'total_price')
            ->where('status', 'paid')
            ->get();

        if ($orders->isEmpty()) {
            return;
        }

        $methods = ['paypal', 'stripe', 'bank_transfer'];

        foreach ($orders as $order) {
            $method = $methods[array_rand($methods)];
            DB::table('payments')->updateOrInsert(
                ['order_id' => $order->id],
                [
                    'payment_method' => $method,
                    'amount' => $order->total_price,
                    'transaction_id' => Str::uuid()->toString(),
                    'transaction_json' => json_encode(['ok' => true, 'method' => $method]),
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
