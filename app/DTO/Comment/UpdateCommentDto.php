<?php

namespace App\DTO\Comment;

use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\User;

readonly class UpdateCommentDto
{
    /**
     * @param User $user
     * @param string $comm_id
     * @param string|null $newComment
     */
    public function __construct(
        public User $user,
        public string $comm_id,
        public ?string $newComment,
    )
    {
    }

    /**
     * @param UpdateCommentRequest $request
     * @return UpdateCommentDto
     */
    public function update(UpdateCommentRequest $request): UpdateCommentDto
    {
        return new self(
            user: $request->user(),
            comm_id: $request->comment_id,
            newComment: $request->new_comment,
        );
    }
}
