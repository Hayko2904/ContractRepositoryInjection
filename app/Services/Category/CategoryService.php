<?php


namespace App\Services\Category;


use App\Repositories\CategoryContract\CategoryRepositoryContract;
use service\BaseService;

final class CategoryService extends BaseService implements CategoryServiceContract
{
    protected $categoryRepositoryContract;

    public function __construct(
        CategoryRepositoryContract $categoryRepositoryContract
    ) {
        $this->categoryRepositoryContract = $categoryRepositoryContract;
    }

    public function getAll()
    {
        return $this->categoryRepositoryContract->getAll();
    }
}
