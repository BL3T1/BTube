<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtitle extends Model
{
    protected $fillable = [
        'video_id',
        'language',
        'subtitle_path',
    ];

    public function videos(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
