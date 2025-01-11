<?php

namespace App\DTO\Collection;

use App\Http\Requests\Collection\UpdateCollectionRequest;
use App\Models\User;

readonly class UpdateCollectionDto
{
    /**
     * @param User $user
     * @param string $id
     * @param string|null $name
     */
    public function __construct(
        public User $user,
        public string $id,
        public ?string $name,
    )
    {
    }

    /**
     * @param UpdateCollectionRequest $request
     * @return UpdateCollectionDto
     */
    public function update(UpdateCollectionRequest $request): UpdateCollectionDto
    {
        return new self(
            user: $request->user(),
            id: $request->id,
            name: $request->name,
        );
    }
}
