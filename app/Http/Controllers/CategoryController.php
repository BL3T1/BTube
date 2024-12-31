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
use App\Models\Category;
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

            $state = CategoryFacade::create($dto);

            if($state == 'already_exist')
                return $this->error(__("responses.{$state}", ['resource' => $dto->name]), 400);

            return $this->success(__("responses.{$state}", ['resource' => $dto->name]), 200);
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

        $category = CategoryFacade::update($dto);

        if(!$category)
            return $this->error();

        return $this->success(__('responses.updated', ['resource' => $dto->name]), 200);
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

        $category = CategoryFacade::delete($dto);

        if($category == null)
            return $this->error();

        return $this->success(__('responses.deleted', ['resource' => $dto->name]), 200);
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

        $category = CategoryFacade::showContent($dto);

        if($category == null)
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
