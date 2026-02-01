<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'mobile_no',
        'address_line1',
        'address_line2',
        'country',
        'city',
        'state',
        'zip_code',
        'payment_method',
        'subtotal',
        'shipping',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
