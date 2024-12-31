<?php

namespace App\Http\Controllers;

use App\DTO\IdDto;
use App\DTO\Playlist\CreatePlaylistDto;
use App\DTO\Playlist\UpdatePlaylistDto;
use App\Http\Requests\IdRequest;
use App\Http\Requests\Playlist\CreatePlaylistRequest;
use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Services\Facades\PlaylistFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;

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
        $dto = UpdatePlaylistDto::update($request);

        $playlist = PlaylistFacade::update($dto);

        if(!$playlist)
            return $this->error();

        return $this->data($playlist);
    }

    public function deletePlaylist(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $action = PlaylistFacade::delete($dto);

        if(!$action)
            return $this->error();

        return $this->success(__('responses.deleted', ['resource' => 'playlist']));
    }

    public function showPlaylistContent(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $playlist = PlaylistFacade::showContent($dto);

        if(!$playlist)
            return $this->error();

        return $this->data($playlist);
    }

    public function showAllPlaylists(): JsonResponse
    {
        $playlists = PlaylistFacade::showAll();

        if(!$playlists)
            return $this->error();

        return $this->data($playlists);
    }
}
