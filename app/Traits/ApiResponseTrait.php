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
     * Return Response.
     *
     * @param string $message
     * @param int $statusCode
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function success(string $message = 'Success', int $statusCode = 200, mixed $data = null): JsonResponse
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
    public function error(string $message = 'An error occurred', int $statusCode = 500): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Return the status code depending on the state.
     *
     * @param $state
     * @return mixed
     */
    public function status($state): mixed
    {
        return config("statuscode.{$state}");
    }

    /**
     * Generate a generic API response for any operation.
     *
     * @param string $result
     * @param string|null $resourceName
     * @param string|null $resourceType
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function generateApiResponse(string $result, ?string $resourceName = null, ?string $resourceType = null, mixed $data = null): JsonResponse
    {
        [$status, $reason] = explode(',', $result) + [null, null];

        $resource = $resourceName || $resourceType
            ? trim("{$resourceName} {$resourceType}")
            : null;

        $message = __("responses.{$status}.{$reason}", [
            'resource' => $resource,
        ]);

        $statusCode = config("statuscode.{$status}", 500);

        return in_array($status, ['created', 'updated', 'deleted', 'ok'])
            ? $this->success($message, $statusCode, $data)
            : $this->error($message, $statusCode);
    }

    /**
     * Return Validation Error
     */
}
