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

        $result = CommentsFacade::add($dto);

        return $this->generateApiResponse();
    }

    public function updateComment(UpdateCommentRequest $request): JsonResponse
    {
        $dto = UpdateCommentDto::update($request);

        $result = CommentsFacade::update($dto);

        return $this->generateApiResponse();
    }

    public function deleteComment(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CommentsFacade::remove($dto);

        return $this->generateApiResponse();
    }

    public function makeReaction(Request $request): JsonResponse
    {
//        $dto = ;
//
//        $result = CommentsFacade::;
//
//        return $this->generateApiResponse();
    }

    public function updateReaction(Request $request): JsonResponse
    {
//        $dto = ;
//
//        $result = CommentsFacade::;
//
//        return $this->generateApiResponse();
    }

    public function removeReaction(Request $request): JsonResponse
    {
//        $dto = ;
//
//        $result = CommentsFacade::;
//
//        return $this->generateApiResponse();
    }
}
