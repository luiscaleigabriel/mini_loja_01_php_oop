<?php

use app\library\Router;

require '../vendor/autoload.php';

session_start();

try {
    $route = new Router;
    $route->add('/', 'GET', 'HomeController:index');
    $route->add('/cart', 'GET', 'CartController:index');
    $route->add('/cart/add', 'GET', 'CartController:add');
    $route->add('/login', 'GET', 'LoginController:index');
    $route->add('/login', 'POST', 'LoginController:store');
    $route->init();
} catch (\Exception $th) {
    var_dump($th->getMessage());
}
