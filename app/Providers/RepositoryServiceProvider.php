<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryContract;
use App\Repositories\BaseRepository;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceContract;
use Illuminate\Support\ServiceProvider;
use service\BaseService;
use service\Contract\BaseContract;

class RepositoryServiceProvider extends ServiceProvider
{
    use ProviderLoaderUtil;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindIf(BaseRepositoryContract::class, BaseRepository::class);
        $this->app->bindIf(BaseContract::class, BaseService::class);

        $this->loadServices();
        $this->contractRepo();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
