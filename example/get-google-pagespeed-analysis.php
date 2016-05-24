<?php
/**
 * SEOstats Example - Get Google Pagespeed Analysis
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/17
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'http://facebook.com/';

    /**
     *  Get the Google Pagespeed Analysis metrics for the given URL.
     *  NOTE: Requires an API key to be set in SEOstats/Config/ApiKeys.php
     */
    $pagespeed = \SEOstats\Services\Google::getPagespeedAnalysis($url);
    print_r($pagespeed);
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
