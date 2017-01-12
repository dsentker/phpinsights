<?php

use GuzzleHttp\Psr7\Response;
use PhpInsights\Result\InsightsResult;
use PHPUnit\Framework\TestCase;
use PhpInsights\InsightsResponse;

class InsightsResultTest extends TestCase
{

    /** @var InsightsResponse */
    protected $exampleComResponse;


    protected function setUp()
    {
        $this->exampleComResponse = InsightsResponse::fromJson(file_get_contents(__DIR__ . '/../example-com-response.json'));
        
    }

    /**
     * @return InsightsResult
     */
    protected function getMappedResult() {
        return $this->exampleComResponse->getMappedResult();
    }

    public function testResponseCode()
    {
        $this->assertEquals(200, $this->getMappedResult()->getResponseCode());
    }

    public function testKind()
    {
        $this->assertEquals('pagespeedonline#result', $this->getMappedResult()->getKind());
    }

    public function testId()
    {
        $this->assertEquals('http://example.com/', $this->getMappedResult()->getId());
    }

    public function testScreenshot()
    {
        $this->assertEquals('image/jpeg', $this->getMappedResult()->getScreenshot()->getMimeType());
    }

    public function testPageStats()
    {
        $this->assertEquals(33, $this->getMappedResult()->getPageStats()->getTotalRequestBytes());
        $this->assertEquals(1599, $this->getMappedResult()->getPageStats()->getHtmlResponseBytes());

    }


}