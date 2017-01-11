# PhpInsights

An API Wrapper for [Googles PageSpeed Insights](https://developers.google.com/speed/docs/insights/v2/reference/pagespeedapi/runpagespeed). The JSON response is mapped to objects for an  headache-free usage. 

## Installation
1. Get an api key from the google developer console for [Page Speed Insights](https://console.developers.google.com/apis/api/pagespeedonline-json.googleapis.com/overview).
2. Have fun with this library.

## Usage

### Simple Usage
```php
$uri = 'http://example.com';
$caller = new \PhpInsights\InsightsCaller('your-google-api-key-here', 'de');
$response = $caller->getResponse($uri, \PhpInsights\InsightsCaller::STRATEGY_MOBILE);
$result = $response->getMappedResult();

var_dump($result->getSpeedScore()); // 100 
var_dump($result->getUsabilityScore()); // 100 
```

### Result details
```php
foreach($result->getFormattedResults()->getRuleResults() as $rule => $ruleResult) {
    
    /*
     * If the rule impact is zero, it means that the website has passed the test.
     */
    if($ruleResult->getRuleImpact() > 0) {
    
        var_dump($rule); // AvoidLandingPageRedirects
        var_dump($ruleResult->->getLocalizedRuleName()); // "Zielseiten-Weiterleitungen vermeiden"
        
        /*
         * The getDetails() method returns is a wrapper to yield the summary field as well as urlblocks data. 
         */
        foreach($ruleResult->getDetails() as $block) {
            var_dump($block->toString()); // "Auf Ihrer Seite sind keine Weiterleitungen vorhanden"
        }
    
    }
    
}
```

### Screenshot
```php
print $result->screenshot->getImageHtml(); // html image element
print $result->screenshot->getData(); // base64 representation from screenshot
```

## Submitting bugs and feature requests
Bugs and feature request are tracked on GitHub.

## ToDo
* Write more tests
* Improve my english skills

## External Libraries
This library depends on [JsonMapper by cweiske](https://github.com/cweiske/jsonmapper) to map json fields to php objects and [Guzzle](https://github.com/guzzle/guzzle) (surprise!).

## Copyright and license
PhpInsights is licensed for use under the MIT License (MIT). Please see LICENSE for more information.