<?php

namespace App\Services\Contracts;

use App\DTO\IdDto;
use App\DTO\Playlist\CreatePlaylistDto;
use App\DTO\Playlist\UpdatePlaylistDto;
use App\DTO\UserDto;

interface PlaylistContract
{
    public function create(CreatePlaylistDto $data): string;

    public function update(UpdatePlaylistDto $data): string;

    public function delete(IdDto $data): string;

    public function showContent(IdDto $data): array;

    public function showCreatorPlaylists(UserDto $data): array;
}
