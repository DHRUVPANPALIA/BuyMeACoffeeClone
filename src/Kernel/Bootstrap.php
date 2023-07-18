<?php

namespace BuyMeACoffeeClone\Kernel;

use Symfony\Component\Dotenv\Dotenv;

final class Bootstrap {
    public function __construct() {
        $dotent =  new Dotenv();
        $this->loadEnvironmentVariables($dotent);    }

    public function run() : void {
        
    }

    private function initialize() {
        
    }

    private function loadEnvironmentVariables(Dotenv $dotenv): void {
        $dotenv->load(__DIR__. '/.env');
    }

}