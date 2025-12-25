<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_id',
        'invoice_date',
        'payment_method',
        'transaction_id',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
}
