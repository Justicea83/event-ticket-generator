<?php

namespace App\Providers;

use App\Repository\Tickets\TicketsRepository;
use App\Repository\Tickets\TicketsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TicketsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->scoped(TicketsRepositoryInterface::class,TicketsRepository::class);
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
