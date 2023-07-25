<?php

declare(strict_types=1);

namespace BuymeAcoffeeClone\Kernel\Http;

use http\Exception\InvalidArgumentException;
use ReflectionClass;

class Router{

    private const CONTROLLER_NAMESPACE = 'BuyMeACoffeeClone\Controller\\'
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

        $uri = '/' . trim($uri, characters: '/');
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
                    throw  new InvalidArgumentException(
                        sprintf('Invalid  "%s" HTTP Request', $_SERVER['REQUEST_METHOD'])
                    );
                    exit('Invalid HTTP request');
                } else {
                     $split =  explode(self::SEPARATOR, $method);
                     $className = self::CONTROLLER_NAMESPACE . $split [0];
                     $method = $split[1];

                     try {
                         $reflection = new ReflectionClass();
                       if (class_exists($className) && $className->hasMethod()){
                           $action = new \ReflectionMethod($className, $method);
                           if ($action->isPublic()) {
                               // Now, we perform the controller's action
                               return $action->invokeArgs(new $className, self::getActionParameters($params));
                           }
                       }
                     } catch () {


                     }
                }

            }
        }

    }

    private static function isHttpMethodValid(): bool{
        return  self::$httpMethod !== null && $_SERVER['REQUEST_METHOD'] !== self::$httpMethod;
    }

    private static function getActionParameters(array $param) {
        foreach ($params as $key => $value) {
            $params[$key] = str_replace($value, '/', '');
        }
    }
    private function isController(string $method): bool {
        return strpos($method, self::SEPARATOR) !== false
    }
}
