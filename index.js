$(document).ready(function(){

    // Banner Owl Carousel
    $("#banner-area .owl-carousel").owlCarousel({
        autoplay: true,
        loop:true,
        dots: true,        
        items: 1
    });

    // Top-Sale Owl Carousel
    $("#top-sale .owl-carousel").owlCarousel({
        autoplay: true,
        loop:true,
        nav:true,
        dots: false,  
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // ISOTOPE FILTER
    var $grid = $(".grid").isotope({
        itemSelector:".grid-item",
        layoutMode:"fitRows"
    });

    // filter items on buttin click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter:filterValue
        });
    });


    // New Phones Owl Carousel
    $("#new-phones .owl-carousel").owlCarousel({
        autoplay: true,
        loop:true,
        nav:false,
        dots: true,  
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // Blogs Owl Carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })

    // product qty section

    // Inrease qty

    // INCREASE QTY WITH JQUERY

    // let $qty_up = $(".qty-up");
    // let $qty_down = $(".qty-down");

    // $qty_up.click(function(e){
    //     let $input = $(`.qty__input[data-id='${$(this).data("id")}']`);
    //     if($input.val()>=1 && $input.val()<10){
    //         $input.val(function(i,oldval){
    //             // console.log($(this).data("id"));
    //             console.log(e.target.dataset.id);
    //             return ++oldval;
    //         });
    //     }
    // });

    // // DECREASE QTY
    // $qty_down.click(function(e){
    //     let $input = $(`.qty__input[data-id='${$(this).data("id")}']`);
    //     if($input.val()>1 && $input.val()<=10){
    //         $input.val(function(i,oldval){
                
    //             console.log($(this).data("id"));
    //             return --oldval;
    //         });
    //     }
    // });

    // INCREASE QTY WITH VANILLA JS BECAUSE I LIKE IT MORE THAN jQUERY, SORRY IT IS NOT PERSONAL

    let deal_price = document.getElementById("deal-price");

    document.querySelectorAll('.qty-up').forEach(item => {
        item.addEventListener('click', (event) => {
            
            // we would like to store the qty input wich has a corresponding data-id attribute
            let qty = document.querySelector(`.qty__input[data-id="${event.target.dataset.id}"]`);
            let value = qty.getAttribute("value") ? qty.getAttribute("value") : 1;
            let product_price = document.querySelector(`.product_price[data-id="${event.target.dataset.id}"]`);
            // Increasing price
            console.log(value);     

            // Change product Price using AJAX call
            $.ajax({
                url: "template/ajax.php", // Where to send the response
                type : 'post',
                data:{
                    itemid : event.target.dataset.id
                },//here we gonna have to response of this request
                success: function(result){
                    console.log(result);
                    // lets convert the JSON data into object
                    let obj = JSON.parse(result);
                    let item_price = obj[0].item_price;
                    

                    if(parseInt(value)>=1 && parseInt(value)<10){
                        ++value;
                         qty.setAttribute("value",value);
                         // Icrease price of the product
                        product_price.innerHTML = parseInt(value) *parseInt(item_price);
                        console.log(product_price); 
                        // set subtotal price
                        let subTotal = parseInt(deal_price.innerHTML) + parseInt(item_price);
                        deal_price.innerHTML = subTotal;
                    }                   
                                   
                }
                

            }); // Closing AJAX Request           
            
        })
    });

    // LETS DECREASE QTY WITH VANILLA JS INSTEAD OF jQuery
    
    document.querySelectorAll('.qty-down').forEach(item => {
        item.addEventListener('click', (event) => {
            // Change product Price using AJAX call
            
            // we would like to store the qty input wich has a corresponding data-id attribute
            let qty = document.querySelector(`.qty__input[data-id="${event.target.dataset.id}"]`);
            let value = qty.getAttribute("value") ? qty.getAttribute("value") : 1;
            let product_price = document.querySelector(`.product_price[data-id="${event.target.dataset.id}"]`);
            // Increasing price
            console.log(value);     

            // Change product Price using AJAX call
            $.ajax({
                url: "template/ajax.php", // Where to send the response
                type : 'post',
                data:{
                    itemid : event.target.dataset.id
                },//here we gonna have to response of this request
                success: function(result){
                    console.log(result);
                    // lets convert the JSON data into object
                    let obj = JSON.parse(result);
                    let item_price = obj[0].item_price;
                    

                    if(parseInt(value)>1 && parseInt(value)<=10){
                        --value;
                         qty.setAttribute("value",value);
                         // Icrease price of the product
                        product_price.innerHTML = parseInt(value) *parseInt(item_price);
                        console.log(product_price); 
                        // set subtotal price
                        let subTotal = parseInt(deal_price.innerHTML) - parseInt(item_price);
                        deal_price.innerHTML = subTotal;
                    }                   
                                   
                }
                

            }); // Closing AJAX Request
            
        })
    });   

    
    
    
      
    
    


});