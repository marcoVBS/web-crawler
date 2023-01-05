<?php

namespace Marco\CrawlyTest\Tests;

use Marco\CrawlyTest\Utils\TokenReplace;
use PHPUnit\Framework\TestCase;

class TokenReplaceTest extends TestCase
{
    /**
     * @return void
     */
    public function testTokenReplacement(): void
    {
        $token = '7w1w6w6u88wy008493900v0v2z9zz451';
        $tokenReplaced = '2d8d3d3f11db991506099e9e7a0aa548';

        $class = new TokenReplace();
        $this->assertEquals($tokenReplaced, $class->tokenReplace($token));
    }
}