<?php

namespace App\Observers;

use App\Models\Order;
use App\Enums\OrderStatusEnum;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $order->statuses()->create(['name' => OrderStatusEnum::REGISTER_ORDER]);
    }
}
