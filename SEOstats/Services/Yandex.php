<?php
namespace SEOstats\Services;

use SEOstats\SEOstats;

/**
 * SEOstats extension for Yandex data.
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/17
 */

class Yandex extends SEOstats
{
    /**
     * Gets the Yandex Search count
     *
     * @param bool $query
     * @param array $param
     * @return \SimpleXMLElement
     */
    public static function getSearchCount($query, array $param = [])
    {
        return Yandex\SearchXML::getResultCount($query, $param);
    }

    /**
     * Gets the Yandex Search result
     *
     * @param bool $query
     * @param array $param
     * @return \SimpleXMLElement
     */
    public static function getSearch($query, array $param = [])
    {
        return Yandex\SearchXML::getResultCount($query, $param);
    }

    public static function getSiteIndexTotal($url = false)
    {
        return self::getSearchCount('site:' . static::getPreparedUrl($url));
    }
}
