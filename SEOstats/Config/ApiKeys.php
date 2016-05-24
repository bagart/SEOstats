<?php
namespace SEOstats\Config;

/**
 * Configuration constants for the SEOstats library.
 *
 * @package    SEOstats
 * @author     Stephan Schmitz <eyecatchup@gmail.com>
 * @copyright  Copyright (c) 2010 - present Stephan Schmitz
 * @license    http://eyecatchup.mit-license.org/  MIT License
 * @updated    2013/12/11
 */

/**
 * Client API keys
 * @package    SEOstats
 */
interface ApiKeys
{
    // To acquire an API key, visit Google's APIs Console here:
    //      https://code.google.com/apis/console
    // In the Services pane, activate the "PageSpeed Insights API" (not the service!).
    // Next, go to the API Access pane. The API key is near the bottom of that pane,
    // in the section titled "Simple API Access.".
    const GOOGLE_SIMPLE_API_ACCESS_KEY = '';

    // 1st - API KEY => SERVER KEY https://console.developers.google.com/apis/credentials
    // 2nd - ENABLE Custom Search API https://console.developers.google.com/apis/api/customsearch/overview
    const GOOGLE_CSE_API_SERVER_ACCESS_KEY = '';

    //make it at:https://cse.google.com/cse/all
    //test it with custom params: https://developers.google.com/apis-explorer/?hl=ru#p/customsearch/v1/search.cse.list?q=news
    const GOOGLE_CSE_API_CX_DEFAULT = '';

    //make it: https://xml.yandex.ru/settings/
    //limits:   default 10 request/day
    //          after confirm phone number - 10 request/day
    const YANDEX_XML_SEARCH_KEY = '';
    const YANDEX_XML_SEARCH_USER = '';

    // To acquire a Mozscape (f.k.a. SEOmoz) API key, visit:
    //      https://moz.com/products/api/keys
    const MOZSCAPE_ACCESS_ID  = '';
    const MOZSCAPE_SECRET_KEY = '';

    // To acquire a SISTRIX API key, visit:
    //      http://www.sistrix.de
    const SISTRIX_API_ACCESS_KEY = '';

    const HTTP_USER_AGENT = 'github.com/bagart/SEOstats';
}
