<?php

require 'Cart.php';
require 'Product.php';

session_start();

$cart = new Cart;
$productInCart = $cart->getCart();

if(array_key_exists('id', $_GET)) {
    $id = strip_tags($_GET['id']);
    $cart->remove($id);
    header('Location: mycart.php');
}

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
<a href="index.php">Back</a>
    <ul>
        <?php foreach($productInCart as $product): ?>
            <li>
                <?= $product->getName() ?>
                <input type="text" value="<?= $product->getQuantity() ?>" />
                <br>
                Price: R$<?= number_format($product->getPrice(), 2, ',', '.') ?>
                <br>
                SubTotal: R$<?= number_format(($product->getPrice() * $product->getQuantity()), 2, ',', '.') ?>
                <br>
                <a href="?id=<?= $product->getId() ?>">Remover</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h1>Valor Total: R$<?= number_format(($_SESSION['cart']['total']), 2, ',', '.') ?></h1>

</body>
</html>