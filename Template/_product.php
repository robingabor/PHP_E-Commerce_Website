<?php
    
  // lets store the product's id 
  $item_id=  $_GET['item_id'] ?? 1; 

  // ADDING ITEM TO THE CART
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add_cart_submit'])){
      // call method addToCart
    $addedItem = $cart->addToCart($_POST['user_id'],$_POST['item_id'],sprintf('%s?item_id=%s',$_SERVER['PHP_SELF'],$item_id));
    echo $addedItem;
    }    
  } 

  foreach($product->getData() as $item):  
    if($item['item_id']==$item_id):

?>

<!-- product -->
<section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <!-- Here comes the pictures and buttons -->
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image'] ?? './assets/products/1.png' ?> " alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-baloo font-size-16">
                            <div class="col">
                                <a href="cart.php"><button type="submit" class="btn btn-danger form-control">Proceed to Buy</button></a>                                
                            </div>
                            <div class="col">
                                <!-- ADD TO CART -->
                                <form action="" method="POST">
                                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                  <?php
                                    if(in_array($item['item_id'],$itemIdsFromCart ?? [])){
                                      echo '<button type="submit" disabled class="btn btn-success form-control font-size-16 ">In the Cart</button>';
                                    }else{
                                      echo '<button type="submit" name="add_cart_submit" class="btn btn-warning form-control font-size-16">Add to Cart</button>';
                                    }
                                  ?>                                  
                                </form>
                                <!-- ! ADD TO CART -->                               
                            </div>
                        </div>
                    </div>
                    <!-- Here comes the main informations of the product -->
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? 'unknown' ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? 'Brand' ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <!-- 'far' is the empty star 'fas' is the solid -->
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                              </div>
                              <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                        </div>
                        <hr class="m-0">

                        <!-- product price -->
                        <!-- we going to use a table here -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Price:</td>
                                <td><strike>$ 162.00</strike></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td class="font-size-20 text-danger">Deal Price:</td>
                                <td>$<span><?php echo $item['item_price'] ?? 0 ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>You Save:</td>
                                <td><span class="font-size-16 text-danger">$10.00</span></td>
                            </tr>
                        </table>
                        <!-- !product price -->

                        <!-- policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days<br>Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">PHP Webshop<br>Delivery</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">1 Year<br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!-- !policy -->

                        <hr>
                        <!-- oder details -->
                        <div id="order-details" class="font-rale text-dark d-flex flex-column">
                          <small>Delivery By : Mar 29 - Apr 1</small>
                          <small>Sold By : <a href="#">PHP Electronics</a>(4,5 out of 5 | 18,198 ratings)</small>
                          <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 42420</small>

                        </div>
                        <!-- !order details -->

                        <div class="row">
                          <!-- colors -->
                          <div class="col-6">
                            
                            <div class="color my-3">
                              
                              <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle border ">
                                  <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-primary-bg rounded-circle border ">
                                  <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-second-bg rounded-circle border ">
                                  <button class="btn font-size-14"></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- !colors -->
                          <div class="col-6">
                            <div class="qty d-flex">
                              <h6 class="font-baloo">Qty:</h6>
                              <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty__input border px-2 w-50 bg-light text-center" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                              </div>
                            </div>                            
                          </div>
                        </div>

                        <!-- RAM Size -->
                        <div class="size my-3">
                          <h6 class="font-baloo">RAM Size:</h6>
                          <div class="d-flex justify-content-between w-75">
                            <div class="font-rubik border p-2">
                              <button class="btn font-size-14 p-0">4GB RAM</button>
                            </div>
                            <div class="font-rubik border p-2">
                              <button class="btn font-size-14 p-0">6GB RAM</button>
                            </div>
                            <div class="font-rubik border p-2">
                              <button class="btn font-size-14 p-0">8GB RAM</button>
                            </div>
                          </div>
                        </div>
                        <!-- !RAM Size -->

                    </div>

                    <div class="col-12">
                      <h6 class="font-rubik">Product Description</h6>
                      <hr>
                      <p class="font-rale font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum perferendis, pariatur eaque sunt dolor natus culpa ratione ullam debitis nostrum cumque quis dolore esse exercitationem neque minima iure ipsum quibusdam accusamus assumenda repudiandae ab. Totam sequi illo odit blanditiis id?</p>
                      <p class="font-rale font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum perferendis, pariatur eaque sunt dolor natus culpa ratione ullam debitis nostrum cumque quis dolore esse exercitationem neque minima iure ipsum quibusdam accusamus assumenda repudiandae ab. Totam sequi illo odit blanditiis id?</p>
                    </div>

                </div>
            </div>

        </section>
        <!-- !product -->

<?php

  endif;
  endforeach;

?>