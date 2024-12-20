<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    protected $fillable = [
        'video_id',
        'language',
        'upload_date',
        'views',
        'avg_watch_time',
        'number_of_likes',
        'number_of_added_to_favorite',
    ];

    protected $hidden = [
        'number_of_added_to_favorite',
        'avg_watch_time',
    ];

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
