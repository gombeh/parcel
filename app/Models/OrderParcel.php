<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ParcelFactory;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderParcel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table='order_parcels';

    /**
     * @var array
     */
    protected $fillable = ['description', 'weight'];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ParcelFactory::new();
    }
}
