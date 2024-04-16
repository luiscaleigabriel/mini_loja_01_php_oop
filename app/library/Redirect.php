<?php

namespace app\library;

class Redirect 
{
    public static function to(string $to) 
    {
        return header("Lacation: $to");
    }

    public static function back() 
    {
        if (isset($_SESSION['redirect'])) {
            return self::to($_SESSION['redirect']['previous']);
        }
    }

    private static function registerFirstRedirect(Route $route) 
    {
  
        $_SESSION['redirect'] = [
            'actual' => $route->uri,
            'previous' => ''
        ];
    }

    private static function registerRedirect(Route $route) 
    {
        $_SESSION['redirect'] = [
            'actual' => $route->uri,
            'previous' => $_SESSION['redirect']['actual']
        ];
    }

    public static function register(Route $route) 
    {

        if (!isset($_SESSION['redirect'])) {
            self::registerFirstRedirect($route);
        }else{
            self::registerRedirect($route);
        }
    }
}