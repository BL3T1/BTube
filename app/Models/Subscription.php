<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    protected $fillable = [
        'viewer_id',
        'creator_id',
        'subscription_date',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, ['viewer_id', 'creator_id']);
    }
}
