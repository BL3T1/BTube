<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Return Current language.
     *
     * @return string
     */
    public function getLang(): string
    {
        return app()->getLocale();
    }

    /**
     * Return Success Response.
     *
     * @param string $message
     * @param int $statusCode
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function success(string $message = 'Success', int $statusCode = 200, mixed $data = null, ): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return Error Response
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(string $message = 'An error occurred', int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Return data.
     *
     * @param mixed $value
     * @param string $key
     * @param string|null $message
     * @return JsonResponse
     */
    public function data(mixed $value, string $key = 'data', string $message = null):JsonResponse
    {
        return response()->json([
            'status' => true,
            $key => $value
        ], 200);
    }

    /**
     * Return Validation Error
     *
     *
     */
}
