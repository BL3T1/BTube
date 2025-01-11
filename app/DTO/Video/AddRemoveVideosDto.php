<?php

namespace App\DTO\Video;

use App\Http\Requests\Video\AddRemoveVideosRequest;
use App\Models\User;

readonly class AddRemoveVideosDto
{
    /**
     * @param User $user
     * @param string $id
     * @param array $vidIds
     */
    public function __construct(
        public User $user,
        public string $id,
        public array $vidIds,
    )
    {
    }

    /**
     * @param AddRemoveVideosRequest $request
     * @return AddRemoveVideosDto
     */
    public function AR(AddRemoveVideosRequest $request): AddRemoveVideosDto
    {
        return new self(
            user: $request->user(),
            id: $request->id,
            vidIds: $request->video_ids,
        );
    }
}
