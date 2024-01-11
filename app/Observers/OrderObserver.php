<?php

namespace App\Observers;

use App\Models\Order;
use App\Enums\OrderStatusEnum;

class OrderObserver
{
    /**
     * Handle the Order "creating" event.
     */
    public function creating(Order $order): void
    {
        $order->status = OrderStatusEnum::REGISTER_ORDER;
    }


    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $order->statuses()->create(['name' => OrderStatusEnum::REGISTER_ORDER]);
    }
}
