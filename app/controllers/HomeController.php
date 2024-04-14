<?php

namespace app\controllers;

use app\database\models\Product;
use app\library\Cart;
use app\library\View;

class HomeController 
{
    public function index() 
    {
        $products = Product::all('id, name, slug, price, image');

        $cart = new Cart;
        var_dump($cart->getCart());

        View::render('home', ['products' => $products]);
    }
}