<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function shelfItem() : MorphOne
    {
        return $this->morphOne(ShelfItem::class, 'itemable');
    }
}
