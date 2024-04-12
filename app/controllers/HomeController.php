<?php

namespace app\controllers;

use app\database\models\Product;
use app\library\View;

class HomeController 
{
    public function index() 
    {
        $products = Product::all();

        echo "<pre>";
        var_dump($products);
        die();

        View::render('home');
    }
}