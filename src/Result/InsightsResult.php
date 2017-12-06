<?php
namespace PhpInsights\Result;

use PhpInsights\Result\Map\FormattedResults;
use PhpInsights\Result\Map\RuleGroup;
use PhpInsights\Result\Map\Screenshot;

class InsightsResult
{

    /** @var string */
    private $kind;

    /** @var string */
    private $id;

    /** @var int */
    public $responseCode;

    /** @var string */
    public $title;

    /** @var \PhpInsights\Result\Map\RuleGroup[] */
    public $ruleGroups;

    /** @var \PhpInsights\Result\Map\PageStats */
    public $pageStats;

    /** @var FormattedResults */
    public $formattedResults;

    /** @var \stdClass */
    public $version;

    /** @var \PhpInsights\Result\Map\Screenshot */
    public $screenshot;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @param int $responseCode
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    /**
     * @param FormattedResults $formattedResults
     */
    public function setFormattedResults(FormattedResults $formattedResults)
    {
        $this->formattedResults = $formattedResults;
    }

    /**
     * @return Map\RuleGroup[]
     */
    public function getRuleGroups()
    {
        return empty($this->ruleGroups)
            ? []
            : $this->ruleGroups;
    }

    /**
     * @return Map\PageStats
     */
    public function getPageStats()
    {
        return $this->pageStats;
    }

    /**
     * @return Map\FormattedResults
     */
    public function getFormattedResults()
    {
        return $this->formattedResults;
    }

    /**
     * @return \stdClass
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return int
     *
     * @throws UsabilityScoreNotAvailableException
     */
    public function getUsabilityScore()
    {
        $ruleGroups = $this->getRuleGroups();

        if (!array_key_exists(RuleGroup::GROUP_USABILITY, $ruleGroups)) {
            throw new UsabilityScoreNotAvailableException('Usability score is only available with mobile strategy API call.');
        }

        return $ruleGroups[RuleGroup::GROUP_USABILITY]->getScore();
    }

    /**
     * @return int
     */
    public function getSpeedScore()
    {
        $ruleGroups = $this->getRuleGroups();

        return $ruleGroups[RuleGroup::GROUP_SPEED]->getScore();

    }

    /**
     * @return bool
     */
    public function hasScreenshot()
    {
        return !empty($this->screenshot);
    }

    /**
     * @return Screenshot
     *
     * @throws ScreenshotNotAvailableException
     */
    public function getScreenshot()
    {

        if (!$this->hasScreenshot()) {
            ScreenshotNotAvailableException::raise();
        }

        return $this->screenshot;
    }


}