<?php
namespace PhpInsights\Result;

class ScreenshotNotAvailableException extends InsightsResultException
{

    /**
     * @throws ScreenshotNotAvailableException
     */
    public static function raise()
    {
        throw new static("A screenshot is not available. Did you disable the screenshot option in API call?");
    }

}