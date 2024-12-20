<?php

namespace App\Http\Controllers;

use App\DTO\Category\CreateCategoryDto;
use App\DTO\Category\DeleteCategoryDto;
use App\DTO\Category\UpdateCategoryDto;
use App\DTO\IdDto;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\IdRequest;
use App\Services\Facades\CategoryFacade;
use App\Traits\ApiResponseTrait;
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

        $category = CategoryFacade::create($dto);

        if(!$category)
            return $this->error(__('responses.already_exist', ['resource' => $category->name]), 400);

        return $this->success(null, __('responses.created', ['resource' => $category->name]), 200);
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

        $action = CategoryFacade::update($dto);

        if(!$action)
            return $this->error();

        return $this->success(null, __('responses.updated', ['resource' => $action]), 200);
    }

    /**
     * Delete a category.
     *
     * @param DeleteCategoryRequest $request
     * @return JsonResponse
     */
    public function deleteCategory(DeleteCategoryRequest $request): JsonResponse
    {
        $dto = DeleteCategoryDto::delete($request);

        $action = CategoryFacade::delete($dto);

        if(!$action)
            return $this->error();

        return $this->success(null, __('responses.deleted', ['resource' => $action]), 200);
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

        $category = CategoryFacade::show($dto);

        if(!$category)
            return $this->error(__('responses.not_found'), 404);

        return $this->data($category);
    }

    /**
     * Show all categories.
     *
     * @return JsonResponse
     */
    public function showCategories(): JsonResponse
    {
        $categories = CategoryFacade::showAll();

        if(!$categories)
            return $this->error();

        return $this->data($categories);
    }
}
