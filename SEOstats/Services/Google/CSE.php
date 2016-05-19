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
use SEOstats\SEOstats as SEOstats;
use SEOstats\Config as Config;
use SEOstats\Helper as Helper;

class CSE extends SEOstats
{
    //const GOOGLE_CSE_URL = 'https://www.googleapis.com/customsearch/v1?';
    const GOOGLE_CSE_URL = 'https://www.googleapis.com/customsearch/v1element?';
    public static function getAuthParams()
    {
        return [
            'cx' => Config\ApiKeys::GOOGLE_CSE_API_CX_DEFAULT,
            'key' => Config\ApiKeys::GOOGLE_CSE_API_ACCESS_KEY
        ];
    }

    public static function getResultCount($query, array $params = [])
    {
        return str_replace(
            ',', 
            '', 
            static::getResult($query, $params)['cursor']['resultCount']
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
        $result = null;
        try {
            $result = file_get_contents($url);
            if ($result) {
                $result = json_decode($result, true);
            }
        } catch (\Exception $e) { }
        if (!$result) {
            throw new E(
                "error while request: {$e->getMessage()} "
                . "with url: {$url} at {$e->getTraceAsString()}"
            );
        }
        
        return $result;
    }
}
