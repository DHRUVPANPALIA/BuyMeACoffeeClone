<?php

declare(strict_types=1);

namespace BuymeAcoffeeClone\Kernel\Http;

class Router{

    private const CONTROLLER_NAME
    private const URI_REGGEX = '#^uri$#';
    private const SEPARATOR  = '@';

    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';
    private ?string $httpMethod = null;

    public static function get(string $uri, string $classMethod = ''){
        self::$httpMethod = self::METHOD_GET;
        self::execute($uri, $classMethod );
    }

    public static function post(string $uri, string $classMethod = '' ): void{
        self::$httpMethod = self::METHOD_POST;
        self::execute($uri, $classMethod );

    }
    public static function execute(string $uri, string $method) {

        $uri = '/' . trim($uri, charaters: '/');
        $url = '/';
        $url .= !empty($_GET['uri']) ? $_GET['uri'] : '';

        if (preg_match( '#^uri$#', $url, $params)){
            if (self::isController($method)) {
                header('301');
                header(
                    sprintf('Location: %s/%s',  $_ENV['SITE_URL'], $method)
                );
            } else {
                if (!self::isHttpMethodValid()){
                    exit('Invalid HTTP request');
                } else {
                     $split =  explode(self::SEPARATOR, $method);
                     $className = self::CONTROLLER_NAMESPACE . $split [0 ];
                }

            }
        }

    }

    private static function isHttpMethodValid(): bool{
        return  self::$httpMethod !== null && $_SERVER['REQUEST_METHOD'] !== self::$httpMethod;
    }
    private function isController(string $method): bool {
        return strpos($method, self::SEPARATOR) !== false
    }
}
