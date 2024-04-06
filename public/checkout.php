<?php

use Stripe\StripeClient;
use app\library\Cart;

require '../vendor/autoload.php';

session_start();

$privateKey = 'sk_test_51P2GG1HGQqI4q1t5jeCM4Zov796DIejWzqMAh0ajyu3xUyCD5CFiAP1oT5CBwuhgyquSkdo9Xsjr6Mjo2haTLLWh00mcUUNZHW';

$stripe = new StripeClient($privateKey);

$cart = new Cart;
$productInCart = $cart->getCart();

$items = [
    'mode' => 'payment',
    'success_url' => 'http://minilojastrip01.com/success.php',
    'cancel_url' => 'http://minilojastrip01.com/cancel.php',
];

foreach ($productInCart as $product) {
    $items['line_items'][] = [
        'price_data' => [
            'currency' => 'brl',
            'product_data' => [
              'name' => $product->getName(),
            ],
            'unit_amount' => $product->getPrice() * 100,
          ],
          'quantity' => $product->getQuantity(),
    ];
}

$checkout_session = $stripe->checkout->sessions->create($items);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>