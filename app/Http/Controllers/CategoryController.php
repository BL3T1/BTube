<?php

namespace App\Http\Controllers;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\DTO\Video\AddRemoveVideosDto;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\IdRequest;
use App\Http\Requests\Video\AddRemoveVideosRequest;
use App\Models\Category;
use App\Services\Facades\CategoryFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;


class CategoryController extends Controller
{
    use ApiResponseTrait;

    /**
     * Create a new category.
     *
     * @param CreateCategoryRequest $request
     * @return JsonResponse
     */
        public function createCategory(CreateCategoryRequest $request): JsonResponse
        {
            $dto = CreateCategoryDto::create($request);

            $result = CategoryFacade::create($dto);

            return $this->generateApiResponse($result, $dto->name, ' category');
        }

    /**
     * Update the category details.
     *
     * @param UpdateCategoryRequest $request
     * @return JsonResponse
     */
    public function updateCategory(UpdateCategoryRequest $request): JsonResponse
    {
        $dto = UpdateCategoryDto::update($request);

        $result = CategoryFacade::update($dto);

        return $this->generateApiResponse($result, $dto->name, ' category');
    }

    /**
     * Delete a category.
     *
     * @param IdRequest $request
     * @return JsonResponse
     */
    public function deleteCategory(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CategoryFacade::delete($dto);

        return $this->generateApiResponse($result, $dto->name, ' category');
    }

    /**
     * Show a category content.
     *
     * @param IdRequest $request
     * @return JsonResponse
     */
    public function showCategoryContent(IdRequest $request): JsonResponse
    {
        $dto = IdDto::id($request);

        $result = CategoryFacade::showContent($dto);

        return $this->generateApiResponse($result[0], null, 'category', $result[1]);
    }

    /**
     * Show all categories.
     *
     * @return JsonResponse
     */
    public function showCategories(): JsonResponse
    {
        $result = CategoryFacade::showAll();

        return $this->generateApiResponse($result[0], null, null, $result[1]);
    }

    public function addToCategory(AddRemoveVideosRequest $request): JsonResponse
    {
        $dto = AddRemoveVideosDto::AR($request);

        $result = CategoryFacade::addToCategory($dto);

        return $this->generateApiResponse();
    }

    public function removeFromCategory(AddRemoveVideosRequest $request): JsonResponse
    {
        $dto = AddRemoveVideosDto::AR($request);

        $result = CategoryFacade::removeFromCategory($dto);

        return $this->generateApiResponse();
    }
}
