<?php
namespace PhpInsights\Result\Map;

class RuleGroup
{

    const GROUP_SPEED = 'SPEED';
    const GROUP_USABILITY = 'USABILITY';

    /** @var int */
    protected $score;

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

}