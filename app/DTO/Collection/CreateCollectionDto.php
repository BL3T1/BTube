<?php

namespace App\DTO\Collection;

use App\Http\Requests\Collection\CreateCollectionRequest;
use App\Models\User;

readonly class CreateCollectionDto
{
    /**
     * @param User $user
     * @param string $name
     */
    public function __construct(
        public User $user,
        public string $name
    )
    {
    }

    /**
     * @param CreateCollectionRequest $request
     * @return CreateCollectionDto
     */
    public function create(CreateCollectionRequest $request): CreateCollectionDto
    {
        return new self(
            user: $request->user(),
            name: $request->name,
        );
    }
}
