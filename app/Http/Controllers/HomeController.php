<?php


namespace App\Http\Controllers;


use App\Services\Category\CategoryServiceContract;

class HomeController extends Controller
{
    protected $categoryServiceContract;

    public function __construct(
        CategoryServiceContract $categoryServiceContract
    ) {
        $this->categoryServiceContract = $categoryServiceContract;
    }

    public function home()
    {
        $categories = $this->categoryServiceContract->getAll();

        return view("home", compact('categories'));
    }
}
