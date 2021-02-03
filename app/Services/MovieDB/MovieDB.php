<?php

namespace App\Services\MovieDB;

use App\Services\MovieDB\Interfaces\MovieDBInterface;
use Illuminate\Support\Facades\Http;

class MovieDB implements MovieDBInterface
{
    private $api_key;
    private $url;

    public function __construct()
    {
        $this->api_key = config('services.moviedb.key');
//        $this->api_key = config('MOVIEDB_API_KEY');
        $this->url = 'https://api.themoviedb.org/3/';
    }

    public function search( $query )
    {
        return Http::get($this->url.'search/movie?api_key='.$this->api_key.'&language=es-ES&query='.$query);
    }


}
