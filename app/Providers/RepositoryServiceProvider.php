<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Interfaces\MusicianInterface',
            'App\Repositories\MusicianRepository'
        );

        $this->app->bind(
            'App\Interfaces\CommentInterface',
            'App\Repositories\CommentRepository'
        );
    }
}