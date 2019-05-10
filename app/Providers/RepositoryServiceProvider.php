<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Repo\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Repository\UserRepositoryInterface::class, \App\Repository\UserRepository::class);
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
