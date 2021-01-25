<?php
  
  //lets randomize our array with builtin shuffle method
  shuffle($mobiles);

  // Request method POST
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['top_sale_submit'])){
      // call method addToCart
    $cart->addToCart($_POST['user_id'],$_POST['item_id'],$_SERVER['PHP_SELF']);
    }    
  } 

?>

<!-- Owl carousel for top-sale -->
<section id="top-sale">
          <div class="container py-5">
            <h4 class="font-rubik font-size-20">Top Sale</h4>
            <hr>
            <div class="owl-carousel owl-theme">
<?php foreach($mobiles as $item): ?>              
              <div class="item py-2">
                <div class="product font-rale">
                  <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? './assets/products/1.png' ?>" class="img-fluid" alt="product1"></a>
                  <div class="text-center">
                    <h6><?php echo $item['item_name'] ?? 'Unknown' ?></h6>
                    <div class="rating text-warning font-size-12">
                      <!-- 'far' is the empty star 'fas' is the solid -->
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2">
                      <span>$<?php echo $item['item_price'] ?? '0'?></span>
                    </div>
                    <!-- lets create a form to send user id and item id  -->
                    <form action="" method="POST">
                      <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                      <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                      <!-- lets check if the item is alread in the cart or not -->
                      <?php
                        if(in_array($item['item_id'],$itemIdsFromCart ?? [])){
                          echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                        }else{
                          echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                        }
                       ?>
                                          
                    </form>
                    
                  </div>
                </div>
              </div>
<?php endforeach; ?> 
            </div>
          </div>
        </section>
        <!-- !Owl carousel for top sale -->