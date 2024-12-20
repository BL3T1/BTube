<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteVideo extends Model
{
    protected $fillable = [
        'favorite_id',
        'video_id',
    ];
}
