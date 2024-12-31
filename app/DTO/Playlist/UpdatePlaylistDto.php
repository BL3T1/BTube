<?php

namespace App\DTO\Playlist;

use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Models\User;

readonly class UpdatePlaylistDto
{
    public function __construct(
        public User $user,
        public string $name,
    )
    {
    }

    public function update(UpdatePlaylistRequest $request): UpdatePlaylistDto
    {
        return new self(
            user: $request->user,
            name: $request->name
        );
    }
}
