<?php
namespace PhpInsights;

use PhpInsights\Result\InsightsResult;
use Psr\Http\Message\ResponseInterface;

class InsightsResponse
{

    /** @var string */
    private $rawJsonResponse;

    /** @var \stdClass */
    private $decodedResponse;

    /**
     * Not callable directly, use InsightsResponse::fromResponse or
     * Insightsresponse::fromJson instead.
     *
     * @param string $jsonResponse
     */
    private function __construct($jsonResponse)
    {
        $this->rawJsonResponse = $jsonResponse;
        $this->decodedResponse = static::validateResponse($jsonResponse);
    }

    /**
     * @param string $json
     *
     * @return \stdClass
     *
     * @throws InvalidJsonException
     */
    public static function validateResponse($json)
    {

        $result = json_decode($json);

        // switch and check possible JSON errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $result;
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        throw new InvalidJsonException($error);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return InsightsResponse
     */
    public static function fromResponse(ResponseInterface $response)
    {
        return new static($response->getBody()->getContents());
    }

    /**
     * @param string $json
     *
     * @return InsightsResponse
     */
    public static function fromJson($json)
    {
        return new static($json);
    }

    /**
     * @return InsightsResult
     */
    public function getMappedResult()
    {

        $mapper = new \JsonMapper();

        /** @var InsightsResult $map */
        $map = $mapper->map($this->decodedResponse, new InsightsResult());

        return $map;
    }

    /**
     * @return string
     */
    public function getRawResult()
    {
        return $this->rawJsonResponse;
    }

}