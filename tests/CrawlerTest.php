<?php

namespace Marco\CrawlyTest\Tests;

use Marco\CrawlyTest\Crawler;
use Marco\CrawlyTest\Utils\TokenReplace;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class CrawlerTest extends TestCase
{
    /**
     * @return void
     */
    public function testCrawler(): void
    {
        $crawler = new Crawler((new DomCrawler()), (new TokenReplace));
        $answer = $crawler->getAnswer();

        $this->assertNotEmpty($answer);
        $this->assertIsString($answer);
    }
}