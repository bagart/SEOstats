<?php
/**
 * SEOstats Example - Get Google Serps
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/17
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

use \SEOstats\Services\Google as Google;

try {
    /**
     *  Get an array containing URL and title for the first
     *  100 results for a Google web search for 'keyword'.
     */
    $query = isset($argv[1]) 
        ? implode(' ', array_slice($argv,1)) 
        : 'news';

    $serps = Google::getSerps($query);

    print_r($serps);

    /**
     *  Get an array containing URL and title for the first
     *  200 results for a Google web search for 'keyword'.
     */
    //$serps = Google::getSerps('keyword', 200);
    //print_r($serps);

    /**
     *  Get an array containing URL, title and position in Serps
     *  for each occurrence of 'http://www.domain.tld' within the
     *  first 1000 results for a Google web search for 'keyword'.
     */
    //$serps = Google::getSerps('keyword', 1000, 'http://www.domain.tld');
    //print_r($serps);
}
catch (\Exception $e) {
    echo 'Caught SEOstatsException: ' .  $e->getMessage();
}
