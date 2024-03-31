<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'is_used',
    ];

    protected $casts = [
        'is_used' => 'boolean',
    ];

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
