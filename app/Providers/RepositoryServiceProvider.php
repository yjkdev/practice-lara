<?php

namespace App\Providers;

use App\Interfaces\PublisherRepositoryInterface;
use App\Repositories\EloquentPublisherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PublisherRepositoryInterface::class,
            EloquentPublisherRepository::class
        );
    }
}
