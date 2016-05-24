<?php
/**
 * SEOstats Example - Get Sistrix Visibility-Index
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2014/07/31
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'http://facebook.com/';

    // Get the Sistrix Visibility-Index for the given URL.
    $vi = \SEOstats\Services\Sistrix::getVisibilityIndex($url);
    echo "The current Sistrix Visibility-Index for {$url} is {$vi}." . PHP_EOL;

    // Get the current available credits for the SISTRIX API (this API call does cost 0 credits currently).
    $credits = \SEOstats\Services\Sistrix::getApiCredits();
    echo "Currently your Sistrix API Key has {$credits} credits available." . PHP_EOL;

    // Get the Sistrix Visibility-Index for the given URL by using the SISTRIX API
    $vi = \SEOstats\Services\Sistrix::getVisibilityIndexByApi($url);
    echo "The current Sistrix Visibility-Index for {$url} is {$vi}." . PHP_EOL;
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
