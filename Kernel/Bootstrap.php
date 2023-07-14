//front controller

<?php

namespace BuyMeACoffeeClone

use Symfony\Component\Dotenv\Dotenv;

final class Bootstrap{
    public function __construct() {
        $this->loadEnvironmentVariables();
    }

    private function initialize() {
        
    }

    private function loadEnvironmentVariables(Dotenv $dotenv): void {
        $dotenv->load(__DIR__. '/.env');
    }


}