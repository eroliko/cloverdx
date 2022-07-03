<?php

namespace App\Providers;

use App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface;
use App\Http\Containers\ClientContainer\Contracts\ClientRepositoryInterface;
use App\Http\Containers\ClientContainer\Queries\ClientQueryBuilder;
use App\Http\Containers\ClientContainer\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            Model::class,
            \App\Http\Core\Models\Model::class
        );

        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );

        $this->app->bind(
            ClientQueryInterface::class,
            ClientQueryBuilder::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
