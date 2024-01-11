<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\OrderStatusEnum;


class Order extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['sender_id', 'receiver_id', 'status'];

    /**
     * @var array
     */
    protected $casts = [
        'name' => OrderStatusEnum::class    
    ];

    /**
     * @return BelongsTo
     */
    public function sender():BelongsTo
    {
        return $this->belongsTo(Customer::class, 'sender_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function receiver():BelongsTo 
    {
        return $this->belongsTo(Customer::class, 'receiver_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function parcels(): HasMany 
    {
        return $this->hasMany(OrderParcel::class, 'order_id', 'id');
    }

    public function statuses() :HasMany 
    {
        return $this->hasMany(OrderStatus::class, 'order_id', 'id');
    }

}
