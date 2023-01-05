<?php

namespace Marco\CrawlyTest\Tests;

use Marco\CrawlyTest\Utils\HttpClient;
use PHPUnit\Framework\TestCase;

class HttpClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testHttpRequest(): void
    {
        $response = HttpClient::request('GET', 'https://www.crawly.com.br/');

        $this->assertEquals(200, $response->getStatusCode());
    }
}