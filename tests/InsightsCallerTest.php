<?php

use PHPUnit\Framework\TestCase;

class InsightsCallerTest extends TestCase
{
    public function testCanConstructed()
    {
        $caller = new \PhpInsights\InsightsCaller('foo');
        return $this->assertInstanceOf('\PhpInsights\InsightsCaller', $caller);

    }
}