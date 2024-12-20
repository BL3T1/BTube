<?php

namespace App\Http\Controllers;

use App\DTO\Playlist\CreatePlaylistDto;
use App\Http\Requests\IdRequest;
use App\Http\Requests\Playlist\CreatePlaylistRequest;
use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Services\Facades\PlaylistFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class PlaylistController extends Controller
{
    use ApiResponseTrait;
    public function createPlaylist(CreatePlaylistRequest $request): JsonResponse
    {
        $dto = CreatePlaylistDto::create($request);

        $playlist = PlaylistFacade::create($dto);

        if(!$playlist)
            return $this->error();

        return $this->data($playlist);
    }

    public function updatePlaylist(UpdatePlaylistRequest $request): JsonResponse
    {

    }

    public function deletePlaylist(IdRequest $request): JsonResponse
    {
        // TODO: remove a playlist functionality.
    }
}
