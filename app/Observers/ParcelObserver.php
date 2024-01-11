<?php

namespace App\Observers;

use App\Models\OrderParcel;

class ParcelObserver
{
    /**
     * Handle the Order "creating" event.
     */
    public function creating(OrderParcel $parcel): void
    {

        $parcel->barcode = mt_rand(100000,999999);
    }
}