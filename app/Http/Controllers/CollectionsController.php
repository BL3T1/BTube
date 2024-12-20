<?php

namespace App\Http\Controllers;

use App\DTO\Collection\CreateCollectionDto;
use App\DTO\Collection\DeleteCollectionDto;
use App\DTO\Collection\UpdateCollectionDto;
use App\DTO\IdDto;
use App\Http\Requests\Collection\CreateCollectionRequest;
use App\Http\Requests\Collection\DeleteCollectionRequest;
use App\Http\Requests\Collection\UpdateCollectionRequest;
use App\Http\Requests\IdRequest;
use App\Services\Facades\CollectionsFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CollectionsController extends Controller
{
    use ApiResponseTrait;

    public function createCollection(CreateCollectionRequest $request): JsonResponse
    {
        $dto = CreateCollectionDto::create($request);

        $collection = CollectionsFacade::create($dto);

        if(!$collection)
            return $this->error();

        return $this->success(__('responses.created', ['resource' => $collection->name . ' collection']));
    }

    public function updateCollection(UpdateCollectionRequest $request): JsonResponse
    {
        $dto = UpdateCollectionDto::update($request);

        $collection = CollectionsFacade::update($dto);

        if(!$collection)
            return $this->error();

        return $this->success(__('responses.updated', ['resource' => $collection->name . ' collection']));
    }

    public function deleteCollection(DeleteCollectionRequest $request): JsonResponse
    {
        $dto = DeleteCollectionDto::delete($request);

        $action = CollectionsFacade::delete($dto);

        if(!$action)
            return $this->error();

        return $this->success(__('responses.deleted', ['resource' => $action->name . 'collection']));
    }

    public function addToCollection(): JsonResponse
    {

    }

    public function removeFromCollection(): JsonResponse
    {

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

        $favorite = CollectionsFacade::addToFavorite($dto);

        if(!$favorite)
            return $this->error();

        return $this->success(__('responses.custom_success.added', ['resource' => 'video', 'destination' => 'favorite']));
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

        $favorite = CollectionsFacade::removeFromFavorite($dto);

        if(!$favorite)
            return $this->error();

        return $this->success(__('responses.custom_success.removed', ['resource' => 'video', 'destination' => 'favorite']));
    }
}
