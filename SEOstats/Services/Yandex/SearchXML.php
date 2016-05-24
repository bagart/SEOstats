<?php
namespace SEOstats\Services\Yandex;
/**
 * Yandex XML Search API
 * It's limited at 10-10k req/day
 * All parametrs: https://xml.yandex.ru/test/
 * @package    SEOstats
 * @author     Baltaev Artur <bagart@list.ru>
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2016/05/25
 */

use SEOstats\Common\SEOstatsException as E;
use SEOstats\SEOstats as SEOstats;
use SEOstats\Config as Config;
use SEOstats\Helper as Helper;

class SearchXML extends SEOstats
{
    const YANDEX_SEARCH_XML_URL = 'https://yandex.com/search/xml?';
    public static function getAuthParams()
    {
        return [
            'key' => Config\ApiKeys::YANDEX_XML_SEARCH_KEY,
            'user' => Config\ApiKeys::YANDEX_XML_SEARCH_USER,
            //'l10n' => 'en',//maximum - without lang
            'filter' => 'none',
            //'query' => $query,
        ];
    }

    public static function getResultCount($query, array $params = [])
    {
        $xml = static::getResult($query, $params);

        $result = $xml->xpath('/yandexsearch/response/found[@priority="all"]');
        if (!$result || !is_numeric((string) current($result))) {
            throw new E(
                "Yandex XML Search: error with response query: {$query}. result w/o found count:" . var_export($xml->asXML(), true)
            );
        }
        
        return (int) current($result);
    }
    
    public static function getResult($query, array $params = [])
    {
        $params =  ['query' => $query] + $params + static::getAuthParams();
        $request = '';
        foreach ($params as $name => $value) {
            $request .= rawurlencode($name) . '=' . rawurlencode($value) . '&';
        }
        $url = static::YANDEX_SEARCH_XML_URL . $request;
        $response = Helper\HttpRequest::sendRequest($url);
        $xml = simplexml_load_string($response);
        if (!$xml) {
            throw new E(
                "Yandex XML API return not XML. url: {$url}\n\tresponse: {$response}"
            );
        }
        if ($error = $xml->xpath('/yandexsearch/response/error')) {
            throw new E(
                "Yandex XML API return not XML. url: {$url}\n\terror: ". var_export(current($error), true)
            );
        }

        return $xml;
    }
}
