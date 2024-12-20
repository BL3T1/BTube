<?php

namespace App\DTO;

use App\Http\Requests\IdRequest;
use App\Models\User;

readonly class IdDto
{
    /**
     * @param int $id
     * @param User $user
     */
    public function __construct(
        public int $id,
        public User $user,
    )
    {
    }

    /**
     * @param IdRequest $request
     * @return IdDto
     */
    public function id(IdRequest $request): IdDto
    {
        return new self(
            id: $request->id,
            user: $request->user()
        );
    }
}
