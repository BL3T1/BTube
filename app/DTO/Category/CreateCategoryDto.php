<?php

namespace App\DTO\Category;

use App\Http\Requests\Category\CreateCategoryRequest;

readonly class CreateCategoryDto
{
    /**
     * @param string $name
     * @param string $description
     */
    public function __construct(
        public string $name,
        public string $description
    )
    {}

    /**
     * @param CreateCategoryRequest $request
     * @return CreateCategoryDto
     */
    public function create(CreateCategoryRequest $request): CreateCategoryDto
    {
        return new self(
            name: $request->name,
            description: $request->description
        );
    }
}
