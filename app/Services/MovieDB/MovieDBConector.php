<?php

namespace App\Services\MovieDB;

use App\Services\MovieDB\Interfaces\MovieSearchableInterface;
use Illuminate\Support\Facades\Http;

class MovieDBConector implements MovieSearchableInterface
{
    private $api_key;
    private $url;

    public function __construct( $key )
    {
        $this->api_key = $key;
        $this->url = 'https://api.themoviedb.org/3/';
    }

    public function search( $query )
    {
        return Http::withOptions([
            'verify' => 'C:\wamp64\bin\php\php7.2.18\cacert.pem'
        ])
            ->get($this->url.'search/movie?api_key='.$this->api_key.'&language=es-ES&query='.$query)
            ->json();
    }
}
