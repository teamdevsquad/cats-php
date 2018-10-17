<?php

namespace Cats\Http;

use GuzzleHttp\Client as BaseGuzzleHttpClient;

class GuzzleHttpClient implements HttpClient
{

    /** @var BaseGuzzleHttpClient */
    private $httpClient;

    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->httpClient = new BaseGuzzleHttpClient([
            'base_uri' => self::BASE_V3_URL,
        ]);
        $this->token      = $token;
    }


    private function getHeader()
    {
        return [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => "Token {$this->token}",
        ];
    }

    public function get($uri)
    {
        $response = $this->httpClient->get($uri, [
            'headers' => $this->getHeader(),
        ]);

        $raw = $response->getBody()->getContents();
        return json_decode($raw, true);
    }
}