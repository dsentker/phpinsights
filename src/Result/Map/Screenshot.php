<?php
namespace PhpInsights\Result\Map;

class Screenshot
{

    /** @var string */
    public $mime_type;

    /** @var string */
    public $data;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    // TODO set "page_rect"

    /**
     * @return string
     */
    public function getData()
    {

        // https://developers.google.com/speed/docs/insights/v2/reference/pagespeedapi/runpagespeed#screenshot.data
        return strtr($this->data, [
            '-' => '+',
            '_' => '/',
        ]);
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * @param string $alt
     *
     * @return string
     */
    public function getImageHtml($alt = '')
    {
        return sprintf('<img src="data:%s;base64,%s" alt="%s">', $this->getMimeType(), $this->getData(), $alt);
    }


}