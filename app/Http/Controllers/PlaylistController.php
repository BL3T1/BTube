<?php

namespace App\Http\Controllers;

use App\DTO\IdDto;
use App\DTO\Playlist\CreatePlaylistDto;
use App\DTO\Playlist\UpdatePlaylistDto;
use App\DTO\UserDto;
use App\Http\Requests\IdRequest;
use App\Http\Requests\Playlist\CreatePlaylistRequest;
use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Services\Facades\PlaylistFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class PlaylistController extends Controller
{
    use ApiResponseTrait;

    public function createPlaylist(CreatePlaylistRequest $request): JsonResponse
    {
        $dto = CreatePlaylistDto::create($request);

        $result = PlaylistFacade::create($dto);

        return $this->generateApiResponse();
    }

    public function updatePlaylist(UpdatePlaylistRequest $request): JsonResponse
    {
        $dto = UpdatePlaylistDto::update($request);

        $result = PlaylistFacade::update($dto);

        return $this->generateApiResponse();
    }

    public function deletePlaylist(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = PlaylistFacade::delete($dto);

        return $this->generateApiResponse();
    }

    public function showPlaylistContent(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = PlaylistFacade::showContent($dto);

        return $this->generateApiResponse();
    }

    public function showCreatorPlaylists(Request $request): JsonResponse
    {
        $dto = UserDto::user($request);

        $result = PlaylistFacade::showCreatorPlaylist($dto);

        return $this->generateApiResponse();
    }
}
