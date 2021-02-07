<?php

namespace App\Services\MovieDB;


class MovieDB extends MovieDBConector
{

    public function __construct($key)
    {
        parent::__construct($key);
    }


    public function search($query)
    {
        return parent::search($query);
    }


    public function getImage($query)
    {
        $movie = parent::search($query);

        // search movie image and return it
        return $movie->image();
    }


    public function getByAuthor($query)
    {

    }


}
