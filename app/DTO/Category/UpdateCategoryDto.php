<?php

namespace App\DTO\Category;

use App\Http\Requests\Category\UpdateCategoryRequest;

readonly class UpdateCategoryDto
{
    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $description
     */
    public function __construct(
        public int $id,
        public ?string $name,
        public ?string $description,
    )
    {
    }

    /**
     * @param UpdateCategoryRequest $request
     * @return UpdateCategoryDto
     */
    public function update(UpdateCategoryRequest $request): UpdateCategoryDto
    {
        return new self(
            id: $request->id,
            name: $request->name,
            description: $request->description,
        );
    }
}
