<?php

namespace App\Services\Services;

use App\DTO\Collection\CreateCollectionDto;
use App\DTO\Collection\UpdateCollectionDto;
use App\DTO\IdDto;
use App\DTO\UserDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Models\Collection;
use App\Models\Favorite;
use App\Models\Video;
use App\Services\Contracts\CollectionsContract;
use Illuminate\Database\Eloquent\Collection as Collections;

class CollectionsService implements CollectionsContract
{
    public function create(CreateCollectionDto $data): string
    {
        if(Collection::where('user_id', $data->user->id)
            -> where('name', $data->name)
            -> first())
            return 'conflict,already_exist';

        Collection::create([
            'user_id' => $data->user->id,
            'name' => $data->name,
        ]);

        return 'created';
    }

    public function update(UpdateCollectionDto $data): string
    {
        $collection = Collection::where('id', $data->id)
            -> first();

        if(!$collection)
            return 'not_found';

        if(Collection::where('name', $data->name))
            return 'conflict, already_exist';

        $collection->name = $data->name;
        $collection->description = $data->description;

        return 'updated';
    }

    public function delete(IdDto $data): string
    {
        $collection = $data->user
            -> collections()
            -> where('id', $data->id)
            -> first();

        if(!$collection)
            return 'not_found';

        $collection->delete();

        return 'deleted';
    }

    public function showContent(IdDto $data): array
    {
        $collection = Collection::where('id', $data->id)
            -> first();

        if(!$collection)
            return ['not_found', null];

        return ['ok', $collection];
    }

    public function showAll(UserDto $data): array
    {
        $collection = Collection::where('user_id', $data->user->id)
            -> get();

        if(!$collection)
            return ['error', null];

        return ['ok', $collection];
    }

    public function addToCollection(AddRemoveVideosDto $data)
    {
        $video = Video::where('id', $data->vidIds)
            -> first();

        $collection = Collection::where('id', $data->id)
            -> where('user_id', $data->user->id)
            -> first();


    }

    public function removeFromCollection(AddRemoveVideosDto $data)
    {
        // TODO: Implement removeFromCollection() method.
    }

    public function addToFavorite(IdDto $data): string
    {
        if(Favorite::where('user_id', $data->user->id)
            -> where('video_id', $data->id)
            -> first())
            return ;

        Favorite::create([
            'user_id' => $data->user->id,
            'video_id' => $data->id
        ]);

        return ;
    }

    public function removeFromFavorite(IdDto $data): string
    {
        // TODO: Implement removeFromFavorite() method.
    }

    public function showFavorites(UserDto $data): Collections
    {
        // TODO: Implement showFavorites() method.
    }
}
