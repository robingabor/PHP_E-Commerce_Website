<?php
    ob_start();
    // Include our header
    include('./header.php'); 
?>

<?php
    
    // Include our banner-area
    include('./Template/_banner-area.php'); 

    // Include our top-sale
    include('./Template/_top-sale.php'); 

    // Include our special-price
    include('./Template/_special-price.php');
    
    // Include our banner-ads
    include('./Template/_banner-ads.php');

    // Include our new-phones
    include('./Template/_new-phones.php');

    // Include our blogs
    include('./Template/_blogs.php');    
    
?>

<?php
    // Include our footer
    include('./footer.php');  
?>

        

        
   