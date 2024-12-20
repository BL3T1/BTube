<?php

namespace App\Services\Contracts;

interface CommentsContract
{
    public function addComment();

    public function updateComment();

    public function removeComment();

    public function addReaction();

    public function updateReaction();

    public function removeReaction();
}
