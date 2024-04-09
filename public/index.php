<?php

use app\library\Router;

require '../vendor/autoload.php';

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

// $products = [
//     1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1000.00, 'quantity' => 1],
//     2 => ['id' => 2, 'name' => 'telefone', 'price' => 1500.00, 'quantity' => 1],
//     3 => ['id' => 3, 'name' => 'mouse', 'price' => 500.00, 'quantity' => 1],
//     4 => ['id' => 4, 'name' => 'nootbook', 'price' => 2500.00, 'quantity' => 1],
// ];

// if(array_key_exists('id', $_GET)) {
//     $id = strip_tags($_GET['id']);
//     $productInfo = $products[$id];

//     $product = new product;
//     $product->setId($productInfo['id']);
//     $product->setName($productInfo['name']);
//     $product->setPrice($productInfo['price']);
//     $product->setQuantity($productInfo['quantity']);

//     $cart = new Cart;
//     $cart->add($product);
// }

