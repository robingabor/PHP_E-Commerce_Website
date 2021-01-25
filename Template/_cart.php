<?php
ob_start();

  // Request method POST
  if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(isset($_POST['delete_cart_submit'])){
      $deletedRecord = $cart->deleteFromCart($_POST['item_id']);
      // echo $deletedRecord;
    }
    if(isset($_POST['add_wishlist_submit'])){
      $addedRecord = $cart->saveForLater($_POST['item_id'],);
      // echo $addedRecord;
    }
  }

?>

<!-- Shopping cart section -->
<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                <!-- Shopping cart items -->
                    <div class="row">
                        <div class="col-sm-9">
                          <?php
                            foreach($product->getData('cart') as $cartItem):
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

                                        <div class="d-flex font-rale w-25">
                                            <button class="qty-up border bg-light" data-id="<?php echo $cartItem['item_id'] ?? 0; ?>"><i class="fas fa-angle-up"></i></button>
                                            <input type="text" data-id="<?php echo $cartItem['item_id'] ?? 0; ?>" class="qty__input border w-100 px-2 bg-light text-center" disabled value="1" placeholder="1">
                                            <button class="qty-down border bg-light" data-id="<?php echo $cartItem['item_id'] ?? 0; ?>"><i class="fas fa-angle-down" ></i></button>
                                        </div>

                                        <form action="" method="post">
                                          <input type="hidden" name="item_id" value="<?php echo $cartItem['item_id'] ?? 0; ?>">
                                          <button type="submit" name="delete_cart_submit" class="font-baloo btn px-3 text-danger border-right"><i class="fas fa-times pr-2"></i>Delete</button> 
                                        </form>
                                                                               
                                        <form action="" method="POST">
                                          <input type="hidden" name="item_id" value="<?php echo $cartItem['item_id'] ?? 0; ?>">
                                          <button type="submit" name='add_wishlist_submit' class="font-baloo btn text-danger"><i class="fas fa-plus pr-2"></i>Save for later</button>
                                         </form>                       
                                                                                
                                    </div>
                                    <!-- !Product qty -->
                                    
                                </div>
                                <!-- Product price -->
                                <div class="col-sm-2">
                                  <div class="font-size-20 text-danger font-baloo text-right">
                                    $<span class="product_price" data-id="<?php echo $cartItem['item_id'] ?? 0; ?>"><?php echo $cartItem['item_price'] ?? 0;?></span>
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
                        <!-- Subtotal -->                        
                        <div class="col-sm-3">
                          <div class="sub-total text-center mt-2">
                            <h6 class="font-rale font-size-12 text-success py-3 border"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery</h6>
                            <div class="border-top py-4">
                              <h5 class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal) : 0; ?> items)&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->total($subTotal) : 0; ?></span></span></h5>
                              <button class="btn btn-warning mt-3">Proceed to buy</button>
                            </div>
                          </div>
                        </div>
                        <!-- !Subtotal -->
                    </div>
                <!-- !Shopping cart items -->

            </div>
        </section>
        <!-- !Shopping cart section -->