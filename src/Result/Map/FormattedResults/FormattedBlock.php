<?php

namespace PhpInsights\Result\Map\FormattedResults;

use PhpInsights\Result\Map\FormattedResults\ArgTypeInterface as ArgTypes;

class FormattedBlock
{

    /** @var string */
    private $format;

    /** @var Arg[] */
    private $args;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString(null);
    }

    /**
     * @return \Closure
     */
    protected static function getDefaultLinkFormatter() {
        return function(Arg $arg, $format) {
            return strtr($format, [
                '{{BEGIN_LINK}}' => sprintf('<a href="%s" target="_blank">', $arg->getValue()),
                '{{END_LINK}}'   => '</a>',
            ]);
        };
    }

    /**
     * @return \Closure
     */
    protected static function getRemoveLinkFormatter() {
        return function(Arg $arg, $format) {
            return strtr($format, [
                '{{BEGIN_LINK}}' => '',
                '{{END_LINK}}'   => '',
            ]);
        };
    }

    /**
     * @return \Closure
     */
    protected static function getPlaceholderFormatter() {
        return function(Arg $arg, $format) {
            $placeholder = sprintf("{{%s}}", $arg->getKey());
            return str_replace($placeholder, $arg->getValue(), $format);
        };
    }

    /**
     * @param \Closure $linkFormatterCallback
     *
     * @return string
     *
     * @throws ArgException
     * @throws FormatException
     */
    public function toString(\Closure $linkFormatterCallback = null)
    {

        $format = $this->getFormat();

        $linkFormatter = (null !== $linkFormatterCallback) ? $linkFormatterCallback : self::getDefaultLinkFormatter();
        $placeholderFormatter = self::getPlaceholderFormatter();

        foreach ($this->getArgs() as $arg) {
            switch ($arg->getType()) {
                case ArgTypes::ARG_TYPE_HYPERLINK:
                    $format = $linkFormatter($arg, $format);
                    break;
                case ArgTypes::ARG_TYPE_BYTES:
                case ArgTypes::ARG_TYPE_DISTANCE:
                case ArgTypes::ARG_TYPE_DURATION:
                case ArgTypes::ARG_TYPE_INT_LITERAL:
                case ArgTypes::ARG_TYPE_PERCENTAGE:
                case ArgTypes::ARG_TYPE_SNAPSHOT_RECT:
                case ArgTypes::ARG_TYPE_STRING_LITERAL:
                case ArgTypes::ARG_TYPE_URL:
                case ArgTypes::ARG_TYPE_VERBATIM_STRING:
                    $format = $placeholderFormatter($arg, $format);
                    break;
                default:
                    throw new ArgException(sprintf('Unknown argument type: "%s"!', $arg->getType()));
            }
        }

        return $format;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return Arg[]
     */
    public function getArgs()
    {
        return is_array($this->args)
            ? $this->args
            : [];
    }

    /**
     * @param Arg[] $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }


}