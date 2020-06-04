<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Context\User\Projectors\UserProjector;
use Spatie\EventSourcing\Facades\Projectionist;
use App\Context\User\Reactors\UserRegisteredReactor;

class ProjectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Projectionist::addProjector(UserProjector::class);
        Projectionist::addReactor(UserRegisteredReactor::class);
    }
}
