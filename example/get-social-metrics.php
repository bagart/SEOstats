<?php
/**
 * SEOstats Example - Get Social Network Metrics
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/17
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

use \SEOstats\Services\Social as Social;

try {
    $url = isset($argv[1]) ? $argv[1] : 'http://facebook.com/';

    // Create a new SEOstats instance.
    $seostats = new \SEOstats\SEOstats;

    // Bind the URL to the current SEOstats instance.
    if ($seostats->setUrl($url)) {

        echo "Social network metrics for " . $url . PHP_EOL;

        /**
         *  Get the total count of +1s for $url on Google+.
         */
        echo "Google+ Shares:          " .
            Social::getGooglePlusShares() . PHP_EOL;

        /**
         *  Get the total count of mentions of $url on Twitter.
         */
        echo "Twitter Shares:          " .
            Social::getTwitterShares() . PHP_EOL;

        /**
         *  Get interaction counts (shares, likes, comments, clicks) for $url on Facebook.
         */
        echo "Facebook Shares:         ";
            print_r(Social::getFacebookShares());

        /**
         *  Get the total count of shares for $url via VKontakte.
         */
        echo "VKontakte Shares:        " .
            Social::getVKontakteShares() . PHP_EOL;

        /**
         *  Get the total count of shares for $url via Pinterest.
         */
        echo "Pinterest Shares:        " .
            Social::getPinterestShares() . PHP_EOL;

        /**
         *  Get the total count of shares for $url via LinkedIn.
         */
        echo "LinkedIn Shares:         " .
            Social::getLinkedInShares() . PHP_EOL;

        /**
         *  Get interaction counts (shares, comments, clicks, reach) for host of $url on Xing.
         */
        echo "Xing Shares:             ";
            print_r(Social::getXingShares());

        /**
         *  Get the total count of shares for $url via Delicious.
         */
        echo "Delicious Shares:        " .
            Social::getDeliciousShares() . PHP_EOL;

        /**
         *  Get the Top10 tags for $url from Delicious.
         */
        echo "Xing Shares:             ";
            print_r(Social::getDeliciousTopTags());

        /**
         *  Get the total count of shares for $url via Digg.
         */
        echo "Digg Shares:             " .
            Social::getDiggShares() . PHP_EOL;

        /**
         *  Get the total count of shares for $url via StumpleUpon.
         */
        echo "StumpleUpon Shares:      " .
            Social::getStumbleUponShares() . PHP_EOL;
    }
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
