<?php
/**
 * SEOstats Example - Get Alexa Metrics
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/16
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

use \SEOstats\Services\Alexa as Alexa;

try {
    $url = isset($argv[1]) ? $argv[1] : 'http://facebook.com/';

    // Create a new SEOstats instance.
    $seostats = new \SEOstats\SEOstats;

    // Bind the URL to the current SEOstats instance.
    if ($seostats->setUrl($url)) {

        echo "Alexa metrics for " . $url . PHP_EOL;

        // Get the global Alexa Traffic Rank (last 3 months).
        echo "Global Rank:      " .
            Alexa::getGlobalRank() . PHP_EOL;

        // Get the country-specific Alexa Traffic Rank.
        echo "Country Rank:     ";
        $countryRank = Alexa::getCountryRank();
        if (is_array($countryRank)) {
            echo $countryRank['rank'] . ' (in ' .
                 $countryRank['country'] . ")" . PHP_EOL;
        }
        else {
            echo "{$countryRank}\r\n";
        }

        // Get Alexa's backlink count for the given domain.
        echo "Total Backlinks:  " .
            Alexa::getBacklinkCount() . PHP_EOL;

        // Get Alexa's page load time info for the given domain.
        echo "Page load time:   " .
            Alexa::getPageLoadTime() . PHP_EOL;
    }
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
