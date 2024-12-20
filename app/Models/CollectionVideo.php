<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionVideo extends Model
{
    protected $fillable = [
        'collection_id',
        'video_id',
    ];
}
