<?php

namespace App\Services\Contracts;

use App\DTO\Collection\CreateCollectionDto;
use App\DTO\Collection\UpdateCollectionDto;
use App\DTO\IdDto;
use App\DTO\UserDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Collection as Collections;

interface CollectionsContract
{
    public function create(CreateCollectionDto $data): string;

    public function update(UpdateCollectionDto $data): string;

    public function delete(IdDto $data): string;

    public function showContent(IdDto $data): array;

    public function showAll(UserDto $data): array;

    public function addToCollection(AddRemoveVideosDto $data);

    public function removeFromCollection(AddRemoveVideosDto $data);

    public function addToFavorite(IdDto $data): string;

    public function removeFromFavorite(IdDto $data): string;

    public function showFavorites(UserDto $data): Collections;
}
