<?php

namespace PhpInsights\Result\Map\FormattedResults;


class UrlBlock extends FormattedBlock
{

    /** @var \PhpInsights\Result\Map\FormattedResults\Header */
    public $header;

    /** @var \PhpInsights\Result\Map\FormattedResults\Url[] */
    public $urls;

    /**
     * @return Url[]
     */
    public function getUrls()
    {
        return (!empty($this->urls) && is_array($this->urls))
            ? $this->urls
            : [];
    }




}