<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryServiceContract;

class CategoryController extends Controller
{
    /**
     * @var CategoryServiceContract
     */
    protected $categoryServiceContract;

    /**
     * CategoryController constructor.
     * @param CategoryServiceContract $categoryServiceContract
     */
    public function __construct(
        CategoryServiceContract $categoryServiceContract
    )
    {
        $this->categoryServiceContract = $categoryServiceContract;
    }

    public function create(CategoryRequest $request)
    {
        return $this->categoryServiceContract->doCreate($request);
    }
}
