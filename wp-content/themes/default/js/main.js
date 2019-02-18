(function ($) {
    function doAnimations( elems ) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        
        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }
    
    //Variables on page load 
    var $myCarousel = $('#carousel-example-generic'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        
    //Initialize carousel 
    $myCarousel.carousel();
    
    //Animate captions in first slide on page load 
    doAnimations($firstAnimatingElems);
    
    //Pause carousel  
    $myCarousel.carousel('pause');
    
    
    //Other slides to be animated on carousel slide event 
    $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });  

    $('#home_slider .sliders').bxSlider({
        mode: 'fade',
        speed: 1000,
        easing: 'ease-in-out',
        auto: true
    });
    
    $('.partners').bxSlider({
        auto: true,
        minSlides: 2,
        maxSlides: 6,
        slideWidth: 160,
        slideMargin: 10,
        moveSlides: 1,
        pager: false
    });

    var $allVideos = $("iframe[src^='https://www.youtube.com']");
    var $fluidEl = 200;
    if ($(".aboutpj_box .post").length > 0) {
        $fluidEl = $(".aboutpj_box .post .thumb");
    } else {
        $fluidEl = $('.video_posts');
    }

    $allVideos.each(function () {

        $(this).data('aspectRatio', this.height / this.width)
                .removeAttr('height')
                .removeAttr('width');

    });
    $(window).resize(function () {
        var newWidth = $fluidEl.width();
        $allVideos.each(function () {
            var $el = $(this);
            $el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
        });
    }).resize();


    //quy trinh hover

    var first_content = $('.proce_posts .post:first .excerpt').html();
    var panel_box = $('.process_box .panel_box');
    panel_box.html(first_content);

    $('.proce_posts .post').hover(function () {
        var content = $(this).find('.excerpt').html();
        panel_box.html(content);
    }, function () {
        panel_box.html(first_content);
    });

    // popup close close
    var hbl = true;
    var hheight = $('#popup_hepler').height();
    $('.hclose').click(function (e) {
        e.preventDefault();
        if (hbl === true) {
            $('.hclose').html('<i class="fa fa-angle-double-up"></i>');
            $('#popup_hepler').animate({bottom: -hheight + 'px'}, 200);
            hbl = false;
        } else {
            $('.hclose').html('<i class="fa fa-close"></i>');
            $('#popup_hepler').animate({bottom: '0px'}, 200);
            hbl = true;
        }
    });

    // sidebar menu

    $('.sidebar_menu > li > ul > li.menu-item-has-children > a').append('<i class="fa fa-plus-circle"></i>');
    $('.sidebar_menu li a i').click(function (e) {
        e.preventDefault();
        var sub_menu = $(this).closest('li').children('ul');
        if (sub_menu.css('display') === 'none') {
            $(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
            sub_menu.slideDown();
        } else {
            $(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            sub_menu.slideUp();
        }
    });

    // main menu
    $(window).resize(function () {
        if (window.matchMedia('(min-width: 768px)').matches) {
            $('#topmenu li.dropdown').mouseenter(function () {
                $(this).addClass('open');
            });
            $('#topmenu li.dropdown').mouseleave(function () {
                $(this).removeClass('open');
            });

            $('#topmenu li.dropdown a').click(function () {
                var url = $(this).attr('href');
                window.location.href = url;
            });
        }
    }).resize();

    // fade modal
    
    $(document).ready(function(){
       setTimeout(function(){
           $('#myModal').modal('show');
       }, 5000) ;
    });
    $(document).ready(function(){
        $('.ngay li').click(function(){
            if ($(this).hasClass('ac')) {

                $(this).children('.nd_ngay').slideUp(400);
                $(this).removeClass('ac');
                $('.ngay li:before').css('content','\f068 !important')
            }else{
                $(this).children('.nd_ngay').slideDown(400);
                $(this).addClass('ac');
            }
          
        })
      })
    
     var wheight = screen.height;
    $(window).scroll(function(){
        var scTop = $(window).scrollTop();
        if(scTop > (wheight/2)){
            $('#to_top').fadeIn(200);
        }else{
            $('#to_top').fadeOut(200);
        }
    });
    
    $('#to_top').click(function(e){
        e.preventDefault();
        $('body, html').animate({scrollTop: 0}, 1000);
    });
    
    $(window).scroll(function() {
        if ($(window).scrollTop() > 36) {
            $('#header').addClass('navbar-fixed-top');
           

        } else {
            $('#header').removeClass('navbar-fixed-top');
           
        }
    });
})(jQuery);

