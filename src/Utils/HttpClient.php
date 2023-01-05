<?php

namespace Marco\CrawlyTest\Utils;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    /** @var Client|null */
    private static Client|null $client = null;

    /**
     * Make a http request
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     */
    public static function request(string $method, $uri = '', array $options = []): ResponseInterface
    {
        if (is_null(self::$client)) {
            self::$client = new Client(['cookies' => true]);
        }

        return self::$client->request($method, $uri, $options);
    }
}