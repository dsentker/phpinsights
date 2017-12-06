<?php
namespace PhpInsights\Result\Map;

use PhpInsights\Result\Map\FormattedResults\DefaultRuleResult;

class FormattedResults
{

    /** @var string */
    private $locale;

    /** @var \PhpInsights\Result\Map\FormattedResults\DefaultRuleResult[] */
    private $ruleResults;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return DefaultRuleResult[]
     */
    public function getRuleResults()
    {
        return $this->ruleResults;
    }

    /**
     * @param \PhpInsights\Result\Map\FormattedResults\DefaultRuleResult[] $ruleResults
     */
    public function setRuleResults($ruleResults)
    {
        $this->ruleResults = $ruleResults;
    }

    /**
     * @param string $group
     *
     * @return DefaultRuleResult[]
     */
    public function getRuleResultsByGroup($group)
    {
        $results = [];
        foreach ($this->getRuleResults() as $rule => $ruleResult) {
            if (in_array($group, $ruleResult->getGroups())) {
                $results[$rule] = $ruleResult;
            }
        }

        return $results;
    }


}