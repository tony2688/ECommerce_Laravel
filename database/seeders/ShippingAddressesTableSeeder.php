<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ShippingAddressesTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->all();
        if (empty($userIds)) {
            return;
        }

        foreach ($userIds as $userId) {
            DB::table('shipping_addresses')->updateOrInsert(
                ['user_id' => $userId],
                [
                    'address' => $faker->streetAddress(),
                    'city' => $faker->city(),
                    'state' => $faker->state(),
                    'postal_code' => $faker->postcode(),
                    'country' => $faker->country(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
