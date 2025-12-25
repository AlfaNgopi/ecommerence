<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersVariants extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price_at_purchase',
        'product_name_at_purchase',
    ];

    public function product()
    {
        return $this->belongsTo(ProductVariant::class, 'product_id');
    }

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
