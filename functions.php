<?php

// Require MySQL connection
require('./database/DBController.php');

// Require Product Class
require('./database/Product.php');

// Require Cart Class
require('./database/Cart.php');

// New DB Controller Object
$db = new DBController();

// New Product Object
$product = new Product($db);
$mobiles = $product->getData();

// New Cart Object
$cart = new Cart($db);
// item id wich are in cart
$itemIdsFromCart = $cart->getItemIdsFromCart($product->getData('cart'));


// print_r($itemIdsFromCart);


?>