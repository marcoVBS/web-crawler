<?php

namespace Marco\CrawlyTest;

use Marco\CrawlyTest\Utils\HttpClient;
use Marco\CrawlyTest\Utils\TokenReplace;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Crawler
{
    /** @var string */
    private string $url = 'http://applicant-test.us-east-1.elasticbeanstalk.com/';

    /** @var DomCrawler */
    private DomCrawler $crawler;

    /**  @var TokenReplace */
    private TokenReplace $token;

    /**
     * Class constructor
     *
     * @param DomCrawler $crawler
     * @param TokenReplace $token
     */
    public function __construct(DomCrawler $crawler, TokenReplace $token)
    {
        $this->token = $token;
        $this->crawler = $crawler;
    }

    /**
     * Execute the crawler
     *
     * @return string
     */
    public function getAnswer(): string
    {
        $html = HttpClient::request('GET', $this->url)->getBody()->getContents();
        $this->crawler->addContent($html);

        $token = $this->crawler->filter('#token')->extract(['value'])[0] ?? '';
        $token = $this->token->tokenReplace($token);

        $responseHtml = HttpClient::request('POST', $this->url, [
            'form_params' => ['token' => $token],
            'headers' => ['Referer' => $this->url]
        ])->getBody()->getContents();

        $this->crawler->clear();
        $this->crawler->addContent($responseHtml);

        return $this->crawler->filter('#answer')->text();
    }
}