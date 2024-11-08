<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'tracking_id',
        'first_name',
        'last_name',
        'mobile',
        'address',
        'address_line',
        'city',
        'country',
        'postal_code',
        'order_note',
        'subtotal',
        'shipping',
        'total',
        'status',
        'payment_method',
        'payment_status',
    ];

    // Optionally define relationships
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class); // Assuming you have an OrderItem model
    }
}
