<?php

namespace app\library;

class Router 
{
    private array $routes = [];

    public function add($uri, $request, $controller) 
    {
        $this->routes[] = new Route($uri, $request, $controller);
    }

    public function init() 
    {
        foreach($this->routes as $route){
            if($route->macth($route)){
                return new Controller($route)->call($route); 
            }
        }
    }

}