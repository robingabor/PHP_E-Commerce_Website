<?php 
ob_start();
?>

<!-- Shopping cart section -->
<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                <!-- Shopping cart items -->
                    <div class="row">
                        <div class="col-sm-9">
                          
                            <!-- Empty Cart -->
                                <div class="row border-top py-3 mt-3">
                                    <div class="col-sm-12 text-center py-2">
                                        <img src="./assets/blog/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height: 200px;">
                                        <p class="font-baloo font-size-16 text-black-50">Empty Cart</p>
                                    </div>
                                </div>
                            <!-- !Empty Cart -->

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