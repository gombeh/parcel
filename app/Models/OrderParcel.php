<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
