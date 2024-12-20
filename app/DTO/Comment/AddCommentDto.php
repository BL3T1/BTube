<?php

namespace App\DTO\Comment;

use App\Http\Requests\Comment\AddCommentRequest;
use App\Models\User;

readonly class AddCommentDto
{
    /**
     * @param User $user
     * @param int $vid_id
     * @param int|null $par_id
     * @param string $content
     */
    public function __construct(
        public User $user,
        public int $vid_id,
        public ?int $par_id,
        public string $content,
    )
    {
    }

    /**
     * @param AddCommentRequest $request
     * @return AddCommentDto
     */
    public function add(AddCommentRequest $request): AddCommentDto
    {
        return new self(
            user: $request->user(),
            vid_id: $request->video_id,
            par_id: $request->parent_id,
            content: $request->comment,
        );
    }
}
