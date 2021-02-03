<?php

namespace App\Services\MovieDB\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use App\Services\MovieDB\MovieDB;

class MovieDBServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MovieDB::class, function($app){
            return new MovieDB(config('services.moviedb.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
