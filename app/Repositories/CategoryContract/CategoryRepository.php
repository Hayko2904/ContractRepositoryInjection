<?php


namespace App\Repositories\CategoryContract;


use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    public function __construct(Container $container)
    {
        $this->setModel(Category::class);
    }

    public function getAll()
    {
        return $this->model::all();
    }

}
