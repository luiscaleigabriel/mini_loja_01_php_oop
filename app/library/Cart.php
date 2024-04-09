<?php

namespace app\library;

class Cart 
{
    public function add(Product $product) 
    {
        $inCart = false;
        $this->setTotal($product);
        if(count($this->getCart()) > 0) {
            foreach($this->getCart() as $productInCart) {
                if($productInCart->getId() === $product->getId()) {
                    $quantity = $productInCart->getQuantity() + $product->getQuantity();
                    $productInCart->setQuantity($quantity);
                    $inCart = true;
                    break;
                }
            }
        }

        if(!$inCart) {
            $this->setProductInCart($product);
        }
    }

    private function setProductInCart($product) 
    {
        $_SESSION['cart']['products'][] = $product; 
    }

    private function setTotal(Product $product) 
    {
        if (!isset($_SESSION['cart']['total'])) {
            $_SESSION['cart']['total'] = 0;
        }

        $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
    }

    public function getTotal() 
    {
        return $_SESSION['cart']['total'] ?? 0;
    }

    public function getCart() {

        if (!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        return $_SESSION['cart']['products'];
    }

    public function remove(int $id) 
    {
        if(isset($_SESSION['cart']['products'])) {
            foreach($this->getCart() as $index => $product) {
                if($product->getId() === $id) {
                    $_SESSION['cart']['total'] -= ($product->getPrice() * $product->getQuantity());
                    unset($_SESSION['cart']['products'][$index]);
                }
            }
        }
    }

}