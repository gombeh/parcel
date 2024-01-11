<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderParcel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            $sender = Customer::factory()->create();
            $receiver = Customer::factory()->create();

            $parcels = OrderParcel::factory(mt_rand(1,5))->make()->toArray();

            $order = Order::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
            ]);

            $order->parcels()->createMany($parcels);
        }
    }
}
