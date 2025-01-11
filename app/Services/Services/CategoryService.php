<?php

namespace App\Services\Services;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\DeleteCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Models\Category;
use App\Models\Video;
use App\Notifications\UncategorizedVideosNotification;
use App\Services\Contracts\CategoryContract;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements CategoryContract
{
    public function create(CreateCategoryDto $data): string
    {
        if(Category::where('name', $data->name)
            -> first())
            return 'conflict,already_exist';

        Category::create([
            'name' => $data->name,
            'description' => $data->description
        ]);

        return 'created';
    }

    public function update(UpdateCategoryDto $data): string
    {
        $category = Category::where('id', $data->id)
            -> first();

        if(!$category)
            return 'not_found';

        if(Category::where('name', $data->name))
            return 'conflict, already_exist';

        $category->name = $data->name;
        $category->description = $data->description;

        return 'updated';
    }

    public function delete(IdDto $data): string
    {
        $category = Category::where('id', $data->id)
            -> first();

        if(!$category)
            return 'not_found';

        $category->delete();

        return 'deleted';
    }

    public function showContent(IdDto $data): array
    {
        $category = Category::where('id', $data->id)
            -> first();

        if(!$category)
            return ['not_found', null];

        return ['ok', $category];
    }

    public function showAll(): array
    {
        $categories = Category::all();

        if(!$categories)
            return ['error', null];

        return ['ok', $categories];
    }

    public function addToCategory(AddRemoveVideosDto $data): array
    {
        $category = Category::where('id', $data->id)
            -> first();

        $videos = Video::where('id', $data->vidIds)
            -> get();
    }

    public function removeFromCategory(AddRemoveVideosDto $data): array
    {

    }

    public function addToCategoryAutomatically(): void
    {
        $categories = Category::pluck('name', 'id');

        $videos = Video::with('categories')
            -> get();

        $uncategorizedVideos = [];

        foreach($videos as $video) {
            if($video->categories->isNotEmpty())
                continue;

            $matchedCategoryId = $categories->search($video->tag);

            if($matchedCategoryId !== false)
                $video->categories()->attach($matchedCategoryId);
            else
                $uncategorizedVideos[] = $video;
        }

        if(!empty($uncategorizedVideos))
            $this->notifyAdmin($uncategorizedVideos);
    }

    protected function notifyAdmin(array $uncategorizedVideos): void
    {
        $videoDetails = collect($uncategorizedVideos)
            -> map(function($video){
                return [
                    'id' => $video->id,
                    'title' => $video->title,
                    'tag' => $video->tag,
                ];
            });

        Notification::route('mail', 'admin@gmail.com')
            -> notify(new UncategorizedVideosNotification($videoDetails));
    }
}
