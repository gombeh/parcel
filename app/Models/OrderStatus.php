<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatusEnum;

class OrderStatus extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table='order_statuses';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $casts = [
        'name' => OrderStatusEnum::class    
    ];
}
