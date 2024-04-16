<?php

namespace app\controllers;

use app\database\models\Product as ModelsProduct;
use app\library\Cart;
use app\library\Product;
use app\library\View;

class CartController 
{
    public function index() 
    {
        View::render('cart');
    }

    public function add() 
    {
        if (array_key_exists('id', $_GET)) {
            $id = strip_tags($_GET['id']);

            $productInfo = ModelsProduct::where('id', $id);

            $product = new Product;
            $product->setId($productInfo->id);
            $product->setName($productInfo->name);
            $product->setPrice($productInfo->price);
            $product->setSlug($productInfo->slug);
            $product->setQuantity(1);
        
            $cart = new Cart;
            $cart->add($product);
        }
    }
}