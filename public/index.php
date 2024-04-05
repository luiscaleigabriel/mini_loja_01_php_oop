<?php

    require 'Cart.php';
    require 'Product.php';

    session_start();

    $products = [
        1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1000, 'quantity' => 1],
        2 => ['id' => 2, 'name' => 'telefone', 'price' => 1500, 'quantity' => 1],
        3 => ['id' => 3, 'name' => 'mouse', 'price' => 500, 'quantity' => 1],
        4 => ['id' => 4, 'name' => 'nootbook', 'price' => 2500, 'quantity' => 1],
    ];

    if(array_key_exists('id', $_GET)) {
        $id = strip_tags($_GET['id']);
        $productInfo = $products[$id];

        $product = new Product;
        $product->setId($productInfo['id']);
        $product->setName($productInfo['name']);
        $product->setPrice($productInfo['price']);
        $product->setQuantity($productInfo['quantity']);

        $cart = new Cart;
        $cart->add($product);
    }

    var_dump($_SESSION['cart']['products'] ?? [])
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Loja</title>
</head>
<body>
    <a href="mycart.php">Go to cart</a>
    <ul>
        <li>Geladeira <a href="?id=1">Add</a> R$2000</li>
        <li>Telefone <a href="?id=2">Add</a> R$1500</li>
        <li>Mouse <a href="?id=3">Add</a> R$500</li>
        <li>NootBook <a href="?id=4">Add</a> R$2500</li>
    </ul>
</body>
</html>