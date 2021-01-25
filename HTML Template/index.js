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

    let $qty_up = $(".qty-up");
    let $qty_down = $(".qty-down");
    // let $input = $(".qty__input");

    // Inrease qty
    $qty_up.click(function(e){
        let $input = $(`.qty__input[data-id='${$(this).data("id")}']`);
        if($input.val()>=1 && $input.val()<10){
            $input.val(function(i,oldval){
                console.log($(this).data("id"));
                return ++oldval;
            });
        }
    });
    // Decrease qty
    $qty_down.click(function(e){
        let $input = $(`.qty__input[data-id='${$(this).data("id")}']`);
        if($input.val()>1 && $input.val()<=10){
            $input.val(function(i,oldval){
                
                console.log($(this).data("id"));
                return --oldval;
            });
        }
    });
    
    


});