<?php
    // Include our header
    include('./header.php'); 
?>
<?php

    // Include cart item if it is not empty
    count($product->getData('cart')) ? include('./Template/_cart.php') : include('./Template/notFound/_cart_notFound.php');
    
    
    // Include our wishlist partial template
    include('./Template/_wishlist.php'); 

    // Include our top-sale partial template
    include('./Template/_new-phones.php'); 
?>
<?php
    // Include our footer
    include('./footer.php'); 
?>