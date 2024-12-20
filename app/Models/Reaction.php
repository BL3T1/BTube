<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reaction extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
        'reaction_type',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class, 'video_id');
    }
}
