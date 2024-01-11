<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sender' => CustomerResource::make($this->sender),
            'receiver' => CustomerResource::make($this->receiver),
            'parcels' => ParcelResource::collection($this->whenLoaded('parcels')),
            'paracels_count' => $this->when($request->route()->named('orders.show'), fn() => $this->parcels->count()),
            'status' => $this->status,
        ];
    }
}
