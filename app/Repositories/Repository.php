<?php


namespace App\Repositories;


use App\Contracts\BaseRepositoryContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class Repository implements BaseRepositoryContract
{
    /**
     * @var string
     */
    protected string $model;

    /**
     * @param $model
     * @return mixed|string
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
}
