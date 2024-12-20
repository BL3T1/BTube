<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Video extends Model
{
    protected $fillable = [
        'title',
        'size',
        'video_tag',
        'length',
        'chapters',
        'description',
        'thumbnails',
        'video_path',
        'is_public'
    ];

    protected $hidden = [
        'video_path',
        'is_public',
    ];

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function detail(): HasOne
    {
        return $this->hasOne(Detail::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Favorite::class);
    }

    public function playlist(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function subtitles(): HasMany
    {
        return $this->hasMany(Subtitle::class);
    }
}
