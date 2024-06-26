<?php

namespace app\controllers;

use app\database\models\Product;
use app\library\CartInfo;
use app\library\View;

class HomeController 
{
    public function index() 
    {
        $products = Product::all('id, name, slug, price, image');

        View::render('home', ['products' => $products]);
    }
}