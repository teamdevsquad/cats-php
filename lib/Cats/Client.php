<?php

namespace Cats;

use GuzzleHttp\Client as HttpClient;

abstract class Client
{
    const BASE_V3_URL = 'https://api.catsone.nl/v3';

    /** @var HttpClient */
    protected $httpClient;

    private $token;

    public function __construct()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => self::BASE_V3_URL,
        ]);
    }

    public static function setup($token)
    {

    }

    private function getHeader()
    {
        return [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => "Token {$this->token}",
        ];
    }

    protected function get($uri)
    {
        $response = $this->httpClient->get($uri, [
            'headers' => $this->getHeader(),
        ]);

        $raw = $response->getBody()->getContents();
        return json_decode($raw, true);
    }

    protected function post()
    {

    }

    protected function put()
    {

    }
}