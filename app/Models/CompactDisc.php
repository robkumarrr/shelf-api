<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CompactDisc extends Model
{
    /** @use HasFactory<\Database\Factories\CompactDiscFactory> */
    use HasFactory;

    protected $fillable = [
        'artist',
        'album_name',
        'number_of_songs',
        'released_on'
    ];

    protected $casts = [
        'released_on' => 'date'
    ];

    public function shelfItem() : MorphMany
    {
        return $this->morphMany(ShelfItem::class, 'itemable');
    }
}
