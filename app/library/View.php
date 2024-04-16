<?php

namespace app\library;
use League\Plates\Engine;

class View 
{
    private static array $instance = [];

    public static function addInstances($instanceKey, $instanceClass) 
    {
        if(!isset(self::$instance[$instanceKey])){
            self::$instance[$instanceKey] = new $instanceClass;
        }
    }

    public static function render(string $view, array $data = []) 
    {
        $path = dirname(__FILE__, 3);
        $filePath = $path . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

        if(!file_exists($filePath . $view . '.php')){
            throw new \Exception("View {$view} does not exist");
        }

        self::addInstances('cart', CartInfo::class);

        $templates = new Engine($filePath);
        $templates->addData(['instances' => self::$instance]);
        echo $templates->render($view, $data);
    }
}