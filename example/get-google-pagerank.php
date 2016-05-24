<?php
/**
 * SEOstats Example - Get Google PageRank
 * @deprecated 
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/04
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'http://facebook.com/';

    // Get the Google PageRank for the given URL.
    $pagerank = \SEOstats\Services\Google::getPageRank($url);
    echo "The current Google PageRank for {$url} is {$pagerank}." . PHP_EOL;
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
