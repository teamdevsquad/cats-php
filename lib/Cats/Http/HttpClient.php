<?php

namespace Cats\Http;

interface HttpClient
{
    const BASE_V3_URL = 'https://api.catsone.nl/v3';

    /**
     * Send a HTTP GET Request to the specified endpoint URI
     *
     * @param string $uri
     * @return array
     */
    public function get($uri);
}