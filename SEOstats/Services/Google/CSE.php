<?php
namespace SEOstats\Services\Google;

/**
 * Google Custom Search Engine (CSE) v1
 * It's paid after 100 req/day
 * All parametrs: https://developers.google.com/apis-explorer/?hl=ru#p/customsearch/v1/search.cse.list
 * @package    SEOstats
 * @author     Stephan Schmitz <bagart@list.ru>
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2016/05/20
 */

use SEOstats\Common\SEOstatsException as E;
use SEOstats\Common\SEOstatsException;
use SEOstats\SEOstats as SEOstats;
use SEOstats\Config as Config;
use SEOstats\Helper as Helper;

class CSE extends SEOstats
{
    //const GOOGLE_CSE_URL = 'https://www.googleapis.com/customsearch/v1element?';//browser
    const GOOGLE_CSE_URL = 'https://www.googleapis.com/customsearch/v1?';
    public static function getAuthParams()
    {
        return [
            'cx' => Config\ApiKeys::GOOGLE_CSE_API_CX_DEFAULT,
            'key' => Config\ApiKeys::GOOGLE_CSE_API_SERVER_ACCESS_KEY
        ];
    }

    public static function getResultCount($query, array $params = [])
    {
        $result = static::getResult($query, $params);
        if (isset($result['searchInformation']['totalResults'])) {
            return $result['searchInformation']['totalResults'];
        }
        throw new E(
            "Google CSE: error with response query: {$query}. result :" . var_export($result, true)
        );
    }
    
    public static function getResult($query, array $params = [])
    {
        $params =  ["q" => $query] + $params + static::getAuthParams();
        $request = '';
        foreach ($params as $name => $value) {
            $request .= rawurlencode($name) . '=' . rawurlencode($value) . '&';
        }
        $url = static::GOOGLE_CSE_URL . $request;
        $result = Helper\HttpRequest::sendRequest($url);
        if (!$result) {
            throw new E(
                "Google CSE: empty result with url: {$url}"
            );
        }

        return $result;
    }
}
