<?php $this->layout('master'); ?>

<h2>Cart</h2>

<?= $instances['cart']->getTotal(); ?>