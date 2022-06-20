<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $table='pedidos';

    protected $fillable = [
        'customer_id',
        'order',
        'order_status',
        'order_date',
        'order_shipping_type',
    ];
}
