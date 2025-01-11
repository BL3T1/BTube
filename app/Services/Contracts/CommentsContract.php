<?php

namespace App\Services\Contracts;

use App\DTO\Comment\AddCommentDto;
use App\DTO\Comment\UpdateCommentDto;
use App\DTO\IdDto;

interface CommentsContract
{
    public function addComment(AddCommentDto $data);

    public function updateComment(UpdateCommentDto $data);

    public function removeComment(IdDto $data);

    public function makeReaction();

    public function updateReaction();

    public function removeReaction();
}
