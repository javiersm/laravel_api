<?php

namespace App\Services\MovieDB\Facades;

use Illuminate\Support\Facades\Facade;

class MovieDBFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'moviedb';
    }

}
