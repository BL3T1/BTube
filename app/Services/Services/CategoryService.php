<?php

namespace App\Services\Services;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\DeleteCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\Models\Category;
use App\Services\Contracts\CategoryContract;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements CategoryContract
{

    public function add(CreateCategoryDto $data): string
    {
        if(Category::where('name', $data->name)
            -> first())
            return 'conflict';

        Category::create([
            'name' => $data->name,
            'description' => $data->description
        ]);

        return 'created';
    }

    public function update(UpdateCategoryDto $data): string
    {
        return Category::where('id', $data->id)
            -> update([
                'name' => $data->name,
                'description' => $data->description
            ]);
    }

    public function delete(DeleteCategoryDto $data): string
    {

        $category = Category::where('name', $data->name)
            -> delete();

    }

    public function showContent(IdDto $data): ?Category
    {

    }

    public function showAll(): Collection
    {
        // TODO: Implement showAll() method.
    }
}
