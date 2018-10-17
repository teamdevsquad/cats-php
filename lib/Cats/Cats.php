<?php

namespace Cats;

use Cats\Http\GuzzleHttpClient;
use Cats\Http\HttpClient;
use Cats\Models\Candidate;

class Cats
{
    private static $httpClient;

    private static $instance;

    public static function instance()
    {
        if (self::$instance) return self::$instance;

        self::$instance = new Cats();

        return self::$instance;
    }

    private function __construct()
    {
    }

    /**
     * @param string $token
     * @param HttpClient|null $httpClient
     */
    public static function setup($token, $httpClient = null)
    {
        self::$httpClient = ($httpClient) ? $httpClient : new GuzzleHttpClient($token);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!self::$httpClient) {
            throw new \RuntimeException("Cats API was not initiated");
        }
        return self::$httpClient;
    }

    public function endpointsMap()
    {
        return [
            Candidate::class => [
                'find'   => '/candidates/{id}',
                'create' => '/candidates?check_duplicate={check_duplicate}',
                'update' => '/candidates/{id}',
            ],
        ];
    }
}