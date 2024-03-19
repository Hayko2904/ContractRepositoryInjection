<?php


namespace App\Repositories;


use App\Contracts\BaseRepositoryContract;
use Illuminate\Contracts\Container\Container;

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

    public function getModel()
    {
        return $this->model;
    }
}
