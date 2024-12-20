<?php

namespace App\DTO\Playlist;

use App\Models\User;

readonly class UpdatePlaylistDto
{
    public function __construct(
        public User $user,
        public
    )
    {
    }
}
