<?php
/**
 * SEOstats Example - Get Google Custom Search Engine (CSE) API
 * @package    SEOstats
 * @author     Baltaev Artur <bagart@list.ru>
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2016/05/20
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'facebook.com';

    $index_count_page = \SEOstats\Services\Google::getSiteIndexTotal($url);
    $index_count_images = \SEOstats\Services\Google::getSiteImageIndexTotal($url);
    
    echo "The current Google index count of $url is $index_count_page page + $index_count_images images." . PHP_EOL;
}
catch (\Exception $e) {
    echo 'Caught ' . get_class($e). ": {$e->getMessage()}\ntrace:" . $e->getTraceAsString();
}
