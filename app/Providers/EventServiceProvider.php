<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $listen = [ 
        UserRegistered::class => [ 
            SendWelcomeEmail::class,
        ], 
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
