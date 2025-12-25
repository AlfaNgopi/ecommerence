<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'image_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
