<?php
/**
 * SEOstats Example - Get Yandex XML Search API
 * @package    SEOstats
 * @author     Baltaev Artur <bagart@list.ru>
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2016/05/20
 */

#require_once realpath(__DIR__ . '/SEOstats/bootstrap.php');
require_once realpath(__DIR__ . '/../vendor/autoload.php');

try {
    $url = isset($argv[1]) ? $argv[1] : 'facebook.com';

    // Get the Google PageRank for the given URL.
    $index_count_page = \SEOstats\Services\Yandex\SearchXML::getResultCount('site:' . $url);
    //$index_count_images = \SEOstats\Services\Yandex\SearchXML::getResultCount('site:' . $url, ['searchtype'=>'image']);
    
    echo "The current Yandex index count of $url is $index_count_page page" . PHP_EOL;// + $index_count_images images.
}
catch (\Exception $e) {
    echo 'Caught ' . get_class($e). ": {$e->getMessage()}\ntrace:" . $e->getTraceAsString();
}
