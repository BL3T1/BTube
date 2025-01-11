<?php

namespace App\Http\Controllers;

use App\DTO\Collection\CreateCollectionDto;
use App\DTO\Collection\UpdateCollectionDto;
use App\DTO\IdDto;
use App\DTO\UserDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Http\Requests\Collection\CreateCollectionRequest;
use App\Http\Requests\Collection\UpdateCollectionRequest;
use App\Http\Requests\IdRequest;
use App\Http\Requests\Video\AddRemoveVideosRequest;
use App\Services\Facades\CollectionsFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    use ApiResponseTrait;

    public function createCollection(CreateCollectionRequest $request): JsonResponse
    {
        $dto = CreateCollectionDto::create($request);

        $result = CollectionsFacade::create($dto);

        return $this->generateApiResponse($result, $dto->name, 'collection');
    }

    public function updateCollection(UpdateCollectionRequest $request): JsonResponse
    {
        $dto = UpdateCollectionDto::update($request);

        $result = CollectionsFacade::update($dto);

        return $this->generateApiResponse($result, $dto->name, 'collection');
    }

    public function deleteCollection(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CollectionsFacade::delete($dto);

        return $this->generateApiResponse($result, $dto->name, 'collection');
    }

    public function showCollectionContent(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CollectionsFacade::showContent($dto);

        return $this->generateApiResponse();
    }

    public function showCollections(Request $request): JsonResponse
    {
        $dto = UserDto::user($request);

        $result = CollectionsFacade::showAll($dto);

        return $this->generateApiResponse();
    }

    public function addToCollection(AddRemoveVideosRequest $request): JsonResponse
    {
        $dto = AddRemoveVideosDto::AR($request);

        $result = CollectionsFacade::addToCollection($dto);

        return $this->generateApiResponse();
    }

    public function removeFromCollection(AddRemoveVideosRequest $request): JsonResponse
    {
        $dto = AddRemoveVideosDto::AR($request);

        $result = CollectionsFacade::removeFromCollection($dto);

        return $this->generateApiResponse();
    }

    /**
     * Add a video to the favorite.
     *
     * @param IdRequest $request
     * @return JsonResponse
     */
    public function addToFavorite(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CollectionsFacade::addToFavorite($dto);

        return $this->generateApiResponse();
    }

    /**
     * Remove a video from favorite.
     *
     * @param IdRequest $request
     * @return JsonResponse
     */
    public function removeFromFavorite(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CollectionsFacade::removeFromFavorite($dto);

        return $this->generateApiResponse();
    }

    public function showFavorites(Request $request): JsonResponse
    {
        $dto = UserDto::user($request);

        $result = CollectionsFacade::showFavorites($dto);

        return $this->generateApiResponse();
    }
}
