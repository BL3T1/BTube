<?php

namespace App\DTO\Category;

use App\Http\Requests\Category\DeleteCategoryRequest;

readonly class DeleteCategoryDto
{
    /**
     * @param string $name
     */
    public function __construct(
        public string $name
    )
    {
    }

    /**
     * @param DeleteCategoryRequest $request
     * @return DeleteCategoryDto
     */
    public function delete(DeleteCategoryRequest $request): DeleteCategoryDto
    {
        return new self(
            name: $request->name
        );
    }
}
