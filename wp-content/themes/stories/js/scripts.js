jQuery(document).ready(function ($) {
    //back to top
    $(window).scroll(function () {
        if ($(window).scrollTop() < 300) {
            $('#back2totop').fadeOut();
        } else {
            $('#back2totop').fadeIn();
        }
    });
    $("#back2totop").on("click", function () {
        $("html, body").animate({scrollTop: 0}, 800);
    });

    $(window).load(function () {
        $('.preloader').fadeOut(1000); // set duration in brackets
    });

    $('.dropdown').hover(
            function () {
                $(this).children('.dropdown-menu').slideDown(200);
            },
            function () {
                $(this).children('.dropdown-menu').slideUp(200);
            }
    );

    var time = 4; // time in seconds

    var $progressBar,
            $bar,
            isPause,
            tick,
            percentTime;
    var $myowlCarousel = $('#main-slider'), $firstAnimatingElems, $active;

    //Init the carousel
    $myowlCarousel.owlCarousel({
        items: 1,
        loop: true,
        autoplay: false,
        dots: false,
        animateOut: 'fadeOut',
        onInitialized: progressBar,
        onTranslate: moved,
        onDrag: pauseOnDragging,
        onTranslated: endEff
    });
    function progressBar() {
        //build progress bar elements
        buildProgressBar();
        //start counting
        start();

    }

    //create div#progressBar and div#bar then prepend to $("#main-slider")
    function buildProgressBar() {

        $progressBar = $("<div>", {
            id: "progressBar"
        });
        $bar = $("<div>", {
            id: "bar"
        });
        $progressBar.append($bar).prependTo("#main-slider");
    }

    function start() {
        //reset timer
        percentTime = 0;
        isPause = false;
        //run interval every 0.01 second
        tick = setInterval(interval, 10);
    }
    ;

    function interval() {
        if (isPause === false) {
            percentTime += 1 / time;
            $bar.css({
                width: percentTime + "%"
            });
            //if percentTime is equal or greater than 100
            if (percentTime >= 100) {
                //slide to next item

                $("#main-slider").trigger('next.owl.carousel');
            }
        }
    }

    //pause while dragging 
    function pauseOnDragging() {
        isPause = true;
    }

    //moved callback
    function moved() {

        $active = $myowlCarousel.find(".owl-item.active").next();
        $firstAnimatingElems = $active.find('.item').find("[data-animation ^= 'animated']");
        $firstAnimatingElems.each(function () {
            var $this = $(this),
                    $animationType = $this.data('animation');

            $this.addClass($animationType);
        });
        //clear interval
        clearTimeout(tick);
        //start again
        start();
    }

    function endEff() {
        $active = $myowlCarousel.find(".owl-item.active").next();
        $firstAnimatingElems = $active.find('.item').find("[data-animation ^= 'animated']");
        $firstAnimatingElems.each(function () {
            var $this = $(this),
                    $animationType = $this.data('animation');

            $this.removeClass($animationType);
        });
    }

    $('.items').matchHeight();

    /*$('header').headroom({
        "offset": 200,
        "classes": {
            "initial": "animated",
            "pinned": "slideDown",
            "unpinned": "slideUp"
        }
    });*/

    $(document).click(function(e) {
      target = e.target;  
      if (($(".vce-zoomed").length == true) && !$(target).is('.search-input')) {
        $('#navigation').find('li').removeClass("vce-zoomed");
      }
    });
    $('body').on("click", ".search_header i", function(e) {      
      $(this).toggleClass('vce-item-selected');
      $(this).parent().parent().toggleClass('vce-zoomed');
      $(this).parent().next().find('.search-input').focus();
      e.stopPropagation();
  });

});