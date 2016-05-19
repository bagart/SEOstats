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

// NOTE: The given path to the autoload.php assumes that you installed SEOstats via composer 
// and copied this example file from ./vendor/seostats/seostats/example/*.php to ./example/*.php
//
// If you did NOT installed SEOstats via composer but instead downloaded the zip file from github.com, 
// you need to follow this steps:
//
// 1. Comment-in line 24 (remove hash char "#") and comment-out line 25 (prepend hash char "#")
// 2. Copy this example file (and the others) from ./example/example.php to ./example.php

// Bootstrap the library / register autoloader
#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'facebook.com';

    // Get the Google PageRank for the given URL.
    $index_count_page = \SEOstats\Services\Google::getCSECount('site:' . $url);
    $index_count_images = \SEOstats\Services\Google::getCSECount('site:' . $url,['searchtype'=>'image']);
    
    echo "The current Google index count of $url is $index_count_page page + $index_count_images images." . PHP_EOL;
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
