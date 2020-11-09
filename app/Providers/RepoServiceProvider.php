<?php

namespace App\Providers;

use App\Repositories\Interfaces\ImageRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\ImageRepository;


/**
 * Class RepoServiceProvider
 * @package App\Providers
 */
class RepoServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }

    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(
            ImageRepositoryInterface::class,
            ImageRepository::class
        );
    }
}
