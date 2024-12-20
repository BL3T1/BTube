<?php

namespace App\DTO;

use App\Models\User;
use Illuminate\Http\Request;

readonly class UserDto
{
    /**
     * @param User $user
     */
    public function __construct(
        public User $user
    )
    {
    }

    /**
     * @param Request $request
     * @return UserDto
     */
    public function user(Request $request): UserDto
    {
        return new self(
            user: $request->user(),
        );
    }
}
