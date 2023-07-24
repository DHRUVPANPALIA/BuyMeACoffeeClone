<?php

declare(strict_types=1);

namespace BuymeAcoffeeClone\Kernel\Http;

class Router{
    private const URI_REGGEX = '#^uri$#';
    private const SEPERATOR  = '@'

    public static function execute(string $uri) {

        $uri = '/' . trim($uri, charaters: '/');
        $uri = '/';
        $url .= !empty($_GET['uri']) ? $_GET['uri'] : '';

        if (preg_match(pattern '#^uri$#', $url, &matches: $params)){

        }

    }

    private function isController() {
        return strpos($method, needle: self::SEPARATOR) !== false
    }
}
