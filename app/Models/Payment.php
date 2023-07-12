<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_item_id',
        'amount',
    ];

    public function cartItem()
    {
        return $this->belongsTo(CartItem::class);
    }
}
