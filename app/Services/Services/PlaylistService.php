<?php

namespace App\Services\Services;

use App\DTO\IdDto;
use App\DTO\Playlist\CreatePlaylistDto;
use App\DTO\Playlist\UpdatePlaylistDto;
use App\DTO\UserDto;
use App\Services\Contracts\PlaylistContract;

class PlaylistService implements PlaylistContract
{
    public function create(CreatePlaylistDto $data): string
    {
        // TODO: Implement create() method.
    }

    public function update(UpdatePlaylistDto $data): string
    {
        // TODO: Implement update() method.
    }

    public function delete(IdDto $data): string
    {
        // TODO: Implement delete() method.
    }

    public function showContent(IdDto $data): array
    {
        // TODO: Implement showContent() method.
    }

    public function showCreatorPlaylists(UserDto $data): array
    {
        // TODO: Implement showCreatorPlaylists() method.
    }
}
