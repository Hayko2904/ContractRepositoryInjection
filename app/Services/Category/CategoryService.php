<?php


namespace App\Services\Category;


use App\Repositories\CategoryContract\CategoryContract;
use service\BaseService;

final class CategoryService extends BaseService implements CategoryServiceContract
{
    protected $categoryContract;

    public function __construct(
        CategoryContract $categoryContract
    ) {
        $this->categoryContract = $categoryContract;
    }

    public function getAll()
    {
        return $this->categoryContract->getAll();
    }
}
