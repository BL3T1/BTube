<?php

namespace App\DTO\Collection;

use App\Http\Requests\Collection\UpdateCollectionRequest;
use App\Models\User;

readonly class UpdateCollectionDto
{
    /**
     * @param User $user
     * @param string $oldName
     * @param string|null $newName
     */
    public function __construct(
        public User $user,
        public string $oldName,
        public ?string $newName,
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
            oldName: $request->old_name,
            newName: $request->new_name,
        );
    }
}
