<?php

namespace App\Http\Controllers;


use App\DTO\Comment\AddCommentDto;
use App\DTO\Comment\UpdateCommentDto;
use App\DTO\IdDto;
use App\Http\Requests\Comment\AddCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Requests\IdRequest;
use App\Services\Facades\CommentsFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    use ApiResponseTrait;

    public function addComment(AddCommentRequest $request): JsonResponse
    {
        $dto = AddCommentDto::add($request);

        $comment = CommentsFacade::add($dto);

        if(!$comment)
            return $this->error();

        return $this->data($comment);
    }

    public function updateComment(UpdateCommentRequest $request): JsonResponse
    {
        $dto = UpdateCommentDto::update($request);

        $comment = CommentsFacade::update($dto);

        if(!$comment)
            return $this->error();

        return $this->data($comment);
    }

    public function deleteComment(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $action = CommentsFacade::remove($dto);

        if(!$action)
            return $this->error();

        return $this->success(__('responses.deleted', ['resource' => 'comment']));
    }

    public function addReaction(Request $request)
    {
        // TODO: add a reaction functionality.
    }

    public function updateReaction(Request $request)
    {
        // TODO: update a reaction functionality.
    }

    public function removeReaction(Request $request)
    {
        // TODO: remove a reaction functionality.
    }
}
