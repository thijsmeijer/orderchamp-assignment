<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLine extends Model
{
    protected $fillable = [
        'order_id',
        'product_id'
    ];

    protected $with = [
        'product',
    ];

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
