<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use ApiResponseTrait;

    public function uploadVideo(Request $request): JsonResponse
    {
        // TODO: add a video functionality.
    }

    public function updateVideo(Request $request): JsonResponse
    {
        // TODO: update a video functionality.
    }

    public function deleteVideo(Request $request): JsonResponse
    {
        // TODO: remove a video functionality.
    }

    public function viewVideo(Request $request): JsonResponse
    {
        // TODO: implement viewVideo() method.
    }
}
