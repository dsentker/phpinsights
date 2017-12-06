<?php
namespace PhpInsights\Result\Map;


class PageStats
{

    /** @var int */
    private $numberResources;

    /** @var int */
    private $numberHosts;

    /** @var int */
    private $totalRequestBytes;

    /** @var int */
    private $numberStaticResources;

    /** @var int */
    private $htmlResponseBytes;

    /** @var int */
    private $cssResponseBytes;

    /** @var int */
    private $imageResponseBytes;

    /** @var int */
    private $javascriptResponseBytes;

    /** @var int */
    private $otherResponseBytes;

    /** @var int */
    private $numberJsResources;

    /** @var int */
    private $numberCssResources;

    /**
     * @return int
     */
    public function getNumberResources()
    {
        return $this->numberResources;
    }

    /**
     * @param int $numberResources
     */
    public function setNumberResources($numberResources)
    {
        $this->numberResources = $numberResources;
    }

    /**
     * @return int
     */
    public function getNumberHosts()
    {
        return $this->numberHosts;
    }

    /**
     * @param int $numberHosts
     */
    public function setNumberHosts($numberHosts)
    {
        $this->numberHosts = $numberHosts;
    }

    /**
     * @return int
     */
    public function getTotalRequestBytes()
    {
        return $this->totalRequestBytes;
    }

    /**
     * @param int $totalRequestBytes
     */
    public function setTotalRequestBytes($totalRequestBytes)
    {
        $this->totalRequestBytes = $totalRequestBytes;
    }

    /**
     * @return int
     */
    public function getNumberStaticResources()
    {
        return $this->numberStaticResources;
    }

    /**
     * @param int $numberStaticResources
     */
    public function setNumberStaticResources($numberStaticResources)
    {
        $this->numberStaticResources = $numberStaticResources;
    }

    /**
     * @return int
     */
    public function getHtmlResponseBytes()
    {
        return $this->htmlResponseBytes;
    }

    /**
     * @param int $htmlResponseBytes
     */
    public function setHtmlResponseBytes($htmlResponseBytes)
    {
        $this->htmlResponseBytes = $htmlResponseBytes;
    }

    /**
     * @return int
     */
    public function getCssResponseBytes()
    {
        return $this->cssResponseBytes;
    }

    /**
     * @param int $cssResponseBytes
     */
    public function setCssResponseBytes($cssResponseBytes)
    {
        $this->cssResponseBytes = $cssResponseBytes;
    }

    /**
     * @return int
     */
    public function getImageResponseBytes()
    {
        return $this->imageResponseBytes;
    }

    /**
     * @param int $imageResponseBytes
     */
    public function setImageResponseBytes($imageResponseBytes)
    {
        $this->imageResponseBytes = $imageResponseBytes;
    }

    /**
     * @return int
     */
    public function getJavascriptResponseBytes()
    {
        return $this->javascriptResponseBytes;
    }

    /**
     * @param int $javascriptResponseBytes
     */
    public function setJavascriptResponseBytes($javascriptResponseBytes)
    {
        $this->javascriptResponseBytes = $javascriptResponseBytes;
    }

    /**
     * @return int
     */
    public function getOtherResponseBytes()
    {
        return $this->otherResponseBytes;
    }

    /**
     * @param int $otherResponseBytes
     */
    public function setOtherResponseBytes($otherResponseBytes)
    {
        $this->otherResponseBytes = $otherResponseBytes;
    }

    /**
     * @return int
     */
    public function getNumberJsResources()
    {
        return $this->numberJsResources;
    }

    /**
     * @param int $numberJsResources
     */
    public function setNumberJsResources($numberJsResources)
    {
        $this->numberJsResources = $numberJsResources;
    }

    /**
     * @return int
     */
    public function getNumberCssResources()
    {
        return $this->numberCssResources;
    }

    /**
     * @param int $numberCssResources
     */
    public function setNumberCssResources($numberCssResources)
    {
        $this->numberCssResources = $numberCssResources;
    }


}