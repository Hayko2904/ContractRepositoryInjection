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

    protected $container;

    /**
     * @param $model
     * @return mixed|string
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    public function getContainer($service = null)
    {
        return $service === null ? ($this->container ?: app()) : ($this->container[$service] ?: app($service));
    }

    public function getModel()
    {
        $entity = $this->getContainer('config')->get('repository.models');

        return $this->model ?: str_replace(['Repositories', 'Repository'], [$entity, ''], static::class);
    }
}
