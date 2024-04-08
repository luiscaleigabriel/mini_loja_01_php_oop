<?php

namespace app\library;
use League\Plates\Engine;

class View 
{
    public static function render(string $view, array $data = []) 
    {
        $path = dirname(__FILE__, 3);
        $filePath = $path . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view;

        if(!file_exists($filePath)){
            throw new \Exception("View {$view} does not exist");
        }

        var_dump($filePath);

        $templates = new Engine($filePath);
    }
}