<?php
  shuffle($mobiles);
  // lets store our brands in a variable
  $brands = array_map(function($pro){return $pro['item_brand'];},$mobiles);
  // in $brands there are duplicates, get rid off them
  $unique = array_unique($brands,SORT_STRING);
  // finally lets sort them alphabetically
  sort($unique);

  // print_r($unique);

  // Request method POST
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['special_price_submit'])){
      // call method addToCart
    $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }    
  } 

?>

<!-- Special Price -->
<section id="special-price">
          <div class="container">
            <h4 class="font-rubik font-size-20">Special Price</h4>
            <!-- Filter Buttons -->
            <div id="filters" class="button-group text-center  font-baloo font-size-14">
              <button class="btn is-checked color-second" data-filter="*">All Brand</button>
              <?php
                foreach($unique as $brand):
              ?>
              <button class="btn color-second" data-filter=".<?php echo $brand ?>"><?php echo $brand ?></button>
              <?php endforeach; ?>
            </div>
            <div class="grid">
              <?php array_map(function($item) use($itemIdsFromCart){?>
                
              <div class="grid-item <?php echo $item['item_brand'] ?? 'Brand' ?> border">
                <div class="item py-2" style="width:200px;">
                  <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? './assets/products/13.png' ?>" class="img-fluid" alt="product1"></a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ?? 'unknown' ?></h6>
                      <div class="rating text-warning font-size-12">
                        <!-- 'far' is the empty star 'fas' is the solid -->
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <div class="price py-2">
                        <span>$<?php echo $item['item_price'] ?? '0' ?></span>
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
              </div>

              <?php },$mobiles); ?>
              </div>
            </div>
          </div>
        </section>        
         <!-- !Special Price -->