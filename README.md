# PhpInsights

An easy-to-use API Wrapper for [Googles PageSpeed Insights](https://developers.google.com/speed/docs/insights/v2/reference/pagespeedapi/runpagespeed). The JSON response is mapped to objects for an  headache-free usage. 

## Installation
1. Get an api key from the google developer console for [Page Speed Insights](https://console.developers.google.com/apis/api/pagespeedonline-json.googleapis.com/overview).
2. ```composer require dsentker/phpinsights```
3. Have fun with this library.

## Usage

### Simple Usage
```php
$url = 'http://example.com';

$caller = new \PhpInsights\InsightsCaller('your-google-api-key-here', 'de');
$response = $caller->getResponse($url, \PhpInsights\InsightsCaller::STRATEGY_MOBILE);
$result = $response->getMappedResult();

var_dump($result->getSpeedScore()); // 100 
var_dump($result->getUsabilityScore()); // 100 
```

### Using Concurrent Requests
```php
$urls = array(
    'http://example.com', 
    'http://example2.com', 
    'http://example3.com'
);

$caller = new \PhpInsights\InsightsCaller('your-google-api-key-here', 'fr');
$responses = $caller->getResponses($urls, \PhpInsights\InsightsCaller::STRATEGY_MOBILE);

foreach ($responses as $url => $response) {
    $result = $response->getMappedResult();

    var_dump($result->getSpeedScore()); // 100 
    var_dump($result->getUsabilityScore()); // 100 
}
```

### Result details
#### Full result
```php
/** @var \PhpInsights\Result\InsightsResult $result */
foreach($result->getFormattedResults()->getRuleResults() as $rule => $ruleResult) {
    
    /*
     * If the rule impact is zero, it means that the website has passed the test.
     */
    if($ruleResult->getRuleImpact() > 0) {
    
        var_dump($rule); // AvoidLandingPageRedirects
        var_dump($ruleResult->getLocalizedRuleName()); // "Zielseiten-Weiterleitungen vermeiden"
        
        /*
         * The getDetails() method is a wrapper to get the `summary` field as well as `Urlblocks` data. You
         * can use $ruleResult->getUrlBlocks() and $ruleResult->getSummary() instead. 
         */
        foreach($ruleResult->getDetails() as $block) {
            var_dump($block->toString()); // "Auf Ihrer Seite sind keine Weiterleitungen vorhanden"
        }
    
    }
    
}
```
#### Result details by Rule group
```php
/** @var \PhpInsights\Result\InsightsResult $result */
foreach($result->getFormattedResults()->getRuleResultsByGroup(RuleGroup::GROUP_SPEED) as $rule => $ruleResult) {
    $ruleResult->getSummary()->toString();
}
```

### Screenshot
```php
print $result->screenshot->getImageHtml(); // html image element
print $result->screenshot->getData(); // base64 screenshot representation 
```

## Testing
``` $ phpunit --bootstrap "path/to/phpinsights/src/autoload.php"```

## Credits
* [Daniel Sentker](https://github.com/dsentker)
* [Nils](https://github.com/nlzet)
* [Joe Dawson](https://github.com/JoeDawson)
* [tlafon](https://github.com/tlafon)
* [baileyherbert](https://github.com/baileyherbert)


## Submitting bugs and feature requests
Bugs and feature request are tracked on GitHub.

## ToDo
* Write more tests
* Improve my english skills

## External Libraries
This library depends on [JsonMapper by cweiske](https://github.com/cweiske/jsonmapper) to map json fields to php objects and [Guzzle](https://github.com/guzzle/guzzle) (surprise!).

## Copyright and license
PhpInsights is licensed for use under the MIT License (MIT). Please see LICENSE for more information.
