<?php

namespace App\Services\Contracts;

interface PlaylistContract
{
    public function addPlaylist();

    public function updatePlaylist();

    public function removePlaylist();
}
