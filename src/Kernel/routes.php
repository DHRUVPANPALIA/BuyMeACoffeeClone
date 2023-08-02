<?php
namespace BuyMeACoffeeClone;

use BuyMeACoffeeClone\Kernel\Http\Router;

Router::get('/', 'Hommepage@index');

Router::get('/', 'Hommepage@edit');

