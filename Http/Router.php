<?php

declare(strict_types=1);

namespace BuymeAcoffeeClone\Kernel\Http;

class Router{
    private const URI_REGG
    public static function execute(string $uri) {

        $uri = '/' . trim($uri, charaters: '/');
        $url = !empty($_GET['uri']) ? '/' . $_GET['uri'] : '/';

    }
}