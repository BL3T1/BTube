<?php

namespace App\Services\Contracts;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\DeleteCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryContract
{
    public function add(CreateCategoryDto $data): string;

    public function update(UpdateCategoryDto $data): string;

    public function delete(DeleteCategoryDto $data): string;

    public function showContent(IdDto $data): ?Category;

    public function showAll(): Collection;
}
