<?php
namespace PhpInsights\Result\Map\FormattedResults;


class AbstractRuleResult
{
    /** @var string */
    private $localizedRuleName;

    /** @var float */
    private $ruleImpact;

    /** @var array */
    private $groups;

    /** @var \PhpInsights\Result\Map\FormattedResults\Summary */
    private $summary;

    /** @var \PhpInsights\Result\Map\FormattedResults\UrlBlock[] */
    public $urlBlocks;

    /**
     * @param string $localizedRuleName
     */
    public function setLocalizedRuleName($localizedRuleName)
    {
        $this->localizedRuleName = $localizedRuleName;
    }

    /**
     * @return string
     */
    public function getLocalizedRuleName()
    {
        return $this->localizedRuleName;
    }

    /**
     * @return float
     */
    public function getRuleImpact()
    {
        return $this->ruleImpact;
    }

    /**
     * @param float $ruleImpact
     */
    public function setRuleImpact($ruleImpact)
    {
        $this->ruleImpact = $ruleImpact;
    }

    /**
     * @return Summary
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param Summary $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return bool
     */
    public function hasSummary()
    {
        return !empty($this->summary);
    }

    /**
     * @return UrlBlock[]
     */
    public function getUrlBlocks()
    {
        return $this->urlBlocks;
    }

    /**
     * @return bool
     */
    public function hasUrlBlocks()
    {
        return !empty($this->urlBlocks) && is_array($this->urlBlocks);
    }

    /**
     * @return FormattedBlock[]
     */
    public function getDetails()
    {

        $details = [];

        if($this->hasUrlBlocks()) {
            foreach($this->getUrlBlocks() as $urlBlock) {
                $details[] = $urlBlock->header;
                foreach($urlBlock->getUrls() as $url) {
                    $details[] = $url->result;
                }
            }
        }

        if($this->hasSummary()) {
            $details[] = $this->getSummary();
        }

        return $details;

    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }


    /**
     * @return string
     */
    public function toString()
    {

        return sprintf('%s (Impact %s)', $this->getLocalizedRuleName(), $this->getRuleImpact());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }



}