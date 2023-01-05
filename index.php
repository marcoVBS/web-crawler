<?php

use Marco\CrawlyTest\Crawler;
use Marco\CrawlyTest\Utils\TokenReplace;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

require './vendor/autoload.php';

$crawler = new Crawler(new DomCrawler(), new TokenReplace);
$answer = $crawler->getAnswer();

echo 'RESPOSTA: ' . $answer . PHP_EOL;