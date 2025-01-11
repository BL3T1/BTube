<?php

namespace App\Services\Contracts;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryContract
{
    public function create(CreateCategoryDto $data): string;

    public function update(UpdateCategoryDto $data): string;

    public function delete(IdDto $data): string;

    public function showContent(IdDto $data): array;

    public function showAll(): array;

    public function addToCategory(AddRemoveVideosDto $data): array;

    public function removeFromCategory(AddRemoveVideosDto $data): array;

    public function addToCategoryAutomatically();
}
