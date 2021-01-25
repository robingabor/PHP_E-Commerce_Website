<?php

// require MySQL Connection
require('../database/DBController.php');
// Require Product Class
require('../database/Product.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->getProductById($_POST['itemid']);
    // convert PHP array or object into JSON
    echo json_encode($result);
}

?>