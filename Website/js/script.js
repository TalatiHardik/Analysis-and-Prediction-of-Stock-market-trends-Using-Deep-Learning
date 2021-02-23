/*==================================

            Preloader

====================================*/

$(window).on('load', function () {
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut();
});

/*=========================

        Navigation
        
==========================*/

$(function(){
   //show or hide navigation on page load
    showHideNav();
    
    $(window).scroll(function(){
       
        //show/hide nav on scroll
        showHideNav();
    });
    function showHideNav(){
        if($(window).scrollTop() > 50){
            //show white nav
            $("nav").addClass("white-nav-top");
            
            //changeing Brand and catagories
            $(".navbar-brand").css({
                "color": "#000",
                "margin-left": "50px"
            });
            $(".dropdown-menu").css("background-color","#fff");
            
            //buttons
            $("#btn-login").addClass("btn-white-nav");
            $("#btn-login").removeClass("btn-login");
            $("#btn-sign-up").addClass("btn-white-nav").css("marginRight","50px");
            $("#btn-sign-up").removeClass("btn-sign-up");
        }
        else{
            //hide white nav
            $("nav").removeClass("white-nav-top");
            
            ///changeing Brand and catagories
            $(".navbar-brand").css("color","#fff");
            $(".dropdown-menu").css("background-color","#000");
            
            //buttons
            $("#btn-login").removeClass("btn-white-nav");
            $("#btn-login").addClass("btn-login");
            $("#btn-sign-up").removeClass("btn-white-nav");
            $("#btn-sign-up").addClass("btn-sign-up");
        }
    }
    
});


/*=========================

        Hot Business
        
==========================*/

$(function(){
   $("#hot-business-slider").owlCarousel({
      item: 3,
       autoplay: true,
       smartSpeed: 700,
       loop: true,
       autoplayHoverPause: true,
       nav: true,
       dots: false,
       navText: ['<i class="fas fa-angle-left" style="color: #fff; font-size: 35px"></i>','<i class="fas fa-angle-right" style="color: #fff; font-size: 35px"></i>']
       
   });
    
});






































