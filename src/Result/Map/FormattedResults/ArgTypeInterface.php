<?php

namespace PhpInsights\Result\Map\FormattedResults;


interface ArgTypeInterface
{

    const ARG_TYPE_BYTES = 'BYTES';
    const ARG_TYPE_DISTANCE = 'DISTANCE'; // Not in use
    const ARG_TYPE_DURATION = 'DURATION';
    const ARG_TYPE_HYPERLINK = 'HYPERLINK';
    const ARG_TYPE_INT_LITERAL = 'INT_LITERAL';
    const ARG_TYPE_PERCENTAGE = 'PERCENTAGE';
    const ARG_TYPE_SNAPSHOT_RECT = 'SNAPSHOT_RECT'; // Not in use
    const ARG_TYPE_STRING_LITERAL = 'STRING_LITERAL'; // Not in use
    const ARG_TYPE_URL = 'URL';
    const ARG_TYPE_VERBATIM_STRING = 'VERBATIM_STRING'; // Not in use

}