<?php


namespace App\Services\Category;

use App\Repositories\CategoryContract\CategoryRepositoryContract;
use Closure;
use Illuminate\Http\Request;
use service\BaseService;

final class CategoryService extends BaseService implements CategoryServiceContract
{
    protected $categoryRepositoryContract;

    public function __construct(
        CategoryRepositoryContract $categoryRepositoryContract
    ) {
        $this->categoryRepositoryContract = $categoryRepositoryContract;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->categoryRepositoryContract->getAll();
    }

    /**
     * @param Request $request
     * @param Closure|null $method
     * @return mixed
     */
    public function doCreate(Request $request, ?Closure $method = null)
    {
        return is_null($method)
            ? $this->categoryRepositoryContract->create($request)
            : $method($this->categoryRepositoryContract->getModel());
    }
}
