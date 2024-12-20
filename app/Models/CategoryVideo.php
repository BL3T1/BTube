<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryVideo extends Model
{
    protected $fillable = [
        'category_id',
        'video_id',
    ];
}