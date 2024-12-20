<?php

namespace App\DTO\Playlist;

use App\Http\Requests\Playlist\CreatePlaylistRequest;
use App\Models\User;

readonly class CreatePlaylistDto
{
    /**
     * @param User $user
     * @param string $name
     * @param bool|null $is_public
     */
    public function __construct(
        public User $user,
        public string $name,
        public ?bool $is_public,
    )
    {
    }

    /**
     * @param CreatePlaylistRequest $request
     * @return CreatePlaylistDto
     */
    public function create(CreatePlaylistRequest $request): CreatePlaylistDto
    {
        return new self(
            user: $request->user(),name: $request->name,is_public: $request->is_public
        );
    }
}
