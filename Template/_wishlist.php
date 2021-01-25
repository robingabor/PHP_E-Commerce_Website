<?php 


ob_start();

  // Request method POST
  if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(isset($_POST['delete_cart_submit'])){
      $deletedRecord = $cart->deleteFromCart($_POST['item_id'],'wishlist');
      // echo $deletedRecord;
    }
    if(isset($_POST['add_to_cart_submit'])){
      $addedRecord = $cart->saveForLater($_POST['item_id'],'cart','wishlist');
      // echo $addedRecord;
    }
  }

?>

<!-- Shopping cart section -->
<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Wishlist</h5>

                <!-- Shopping cart items -->
                    <div class="row">
                        <div class="col-sm-9">
                          <?php
                            foreach($product->getData('wishlist') as $cartItem):
                              $productsById = $product->getProductById($cartItem['item_id']);
                              // print_r($cart);
                              $subTotal[] = array_map(function($cartItem){
                              
                          ?>
                            <!-- cart item -->
                            <div class="row border-top py-3 mt-3 mb-5">
                                <div class="col-sm-2">
                                    <img src="<?php echo $cartItem['item_image'] ?? './assets/products/1.png'; ?>" alt="cart1" style="height:120px" class="img-fluid">
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-baloo font-size-20"><?php echo $cartItem['item_name'] ?? 'Unknown'; ?></h5>
                                    <small>by <?php echo $cartItem['item_brand'] ?? 'Brand';?></small>
                                    <!-- Product rating -->
                                    <div class="d-flex">
                                        <div class="rating text-warning font-size-12">
                                            <!-- 'far' is the empty star 'fas' is the solid -->
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                          </div>
                                          <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                    </div>
                                    <!-- !Product rating -->

                                    <!-- Product qty -->
                                    <div class="qty d-flex pt-2">
                                        
                                        <form action="" method="post">
                                          <input type="hidden" name="item_id" value="<?php echo $cartItem['item_id'] ?? 0; ?>">
                                          <button type="submit" name="delete_cart_submit" class="font-baloo btn pl-0 pr-3 text-danger border-right"><i class="fas fa-times pr-2"></i>Delete</button> 
                                        </form>

                                         <form action="" method="POST">
                                          <input type="hidden" name="item_id" value="<?php echo $cartItem['item_id'] ?? 0; ?>">
                                          <button type="submit" name='add_to_cart_submit' class="font-baloo btn text-danger"><i class="fas fa-plus pr-2"></i>Add To Cart</button>
                                         </form>                                      
                                                                 
                                                                                
                                    </div>
                                    <!-- !Product qty -->
                                    
                                </div>
                                <!-- Product price -->
                                <div class="col-sm-2">
                                  <div class="font-size-20 text-danger font-baloo text-right">
                                    $<span class="product_price" data-id="<?php echo $cartItem['item_id']  ?? 0; ?>"><?php echo $cartItem['item_price'] ?? 0;?></span>
                                  </div>
                                </div>
                                <!-- !Product price -->

                            </div>
                            <!-- !cart item -->
                            <?php
                              return $cartItem['item_price'];

                              },$productsById); //Closing array_map function
                              
                              endforeach;
                              // print_r($subTotal);
                              
                            ?>

                        </div>
                        
                    </div>
                <!-- !Shopping cart items -->

            </div>
        </section>
        <!-- !Shopping cart section -->

