<?php

namespace App\DTO\Collection;

use App\Http\Requests\Collection\DeleteCollectionRequest;
use App\Models\User;

readonly class DeleteCollectionDto
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

    public function delete(DeleteCollectionRequest $request): DeleteCollectionDto
    {
        return new self(
            user: $request->user(),
            name: $request->name
        );
    }
}
