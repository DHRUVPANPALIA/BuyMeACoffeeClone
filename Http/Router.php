<?php

declare(strict_types=1);

namespace BuymeAcoffeeClone\Kernel\Http;

class Router{
    private const URI_REGGEX = '#^uri$#';
    private const SEPARATOR  = '@';

    public static function execute(string $uri, string $method) {

        $uri = '/' . trim($uri, charaters: '/');
        $url = '/';
        $url .= !empty($_GET['uri']) ? $_GET['uri'] : '';

        if (preg_match( '#^uri$#', $url, $params)){
            if (self::isController($method)) {
                header(
                    sprintf('Location: %s/%s',  $_ENV['SITE_URL'], $method)
                );

            }
        }

    }

    private function isController(string $method): bool {
        return strpos($method, self::SEPARATOR) !== false
    }
}
