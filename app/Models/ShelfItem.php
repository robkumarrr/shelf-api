<?php

namespace App\Models;

use App\ShelfItemStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ShelfItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'itemable_type',
        'itemable_id',
        'rating',
        'acquired_on',
        'last_used_on',
        'status',
        'purchase_price',
        'purchase_location',
        'description'
    ];

    protected $casts = [
        'status' => ShelfItemStatus::class,
        'acquired_on' => 'date',
        'last_used_on' => 'date',
        'purchase_price' => 'decimal:2',
    ];

    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
