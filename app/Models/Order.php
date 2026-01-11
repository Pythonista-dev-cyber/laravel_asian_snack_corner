<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'order_id', 'fullname', 'email', 'phone',
    'shipping_address', 'payment_method', 'order_items',
    'total', 'order_status', 'order_date'
];

}
