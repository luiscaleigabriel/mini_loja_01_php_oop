<?php

namespace app\library;

class Controller 
{
    // private const NAMESPACE = 'app\\controllers\\';

    public function call(Route $route) 
    {
        $controller = $route->controller;
    }

}