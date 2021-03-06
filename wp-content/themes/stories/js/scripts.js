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

    $('.dropdown').hover(
            function () {
                $(this).children('.dropdown-menu').slideDown(200);
            },
            function () {
                $(this).children('.dropdown-menu').slideUp(200);
            }
    );

    $('.items').matchHeight();

    //Filtering section nav
    if($("#blog-type").length > 0) {
        $('#blog-type li').click(function () {
            $('.filter-type .filtr').removeClass('filtr-active');
            $(this).addClass('filtr-active');
        });
        var filteriblog = $('.filtr-container').filterizr();
    }
    if($('#main-slider').lenth > 0) {
        $('#main-slider').bxSlider({
            auto: true,
            speed: 1000,
            controls: false,
            pause: 10000,
            mode: 'fade',
            captions: false,
            pager: false,
            startSlide: 0
        });
    }

    $('#list-gal').bxSlider({
        slideWidth: 210,
        minSlides: 3,
        maxSlides: 6,
        slideMargin: 0,
        auto: true,
        speed: 1000,
        controls: true,
        pause: 10000,
        captions: false,
        pager: false,
        moveSlides: true
    });

    new WOW().init({
        mobile: false
    });

    $('.drawer').drawer();

    var isSearchHover = false;
    $(document).click(function () {
        if (!isSearchHover)
            $('#search-icon form, #search-icon-desk form').fadeOut(250);
    });
    $(document).on('click', '#search-icon-icon, .btnsearch', function () {
        var $$ = $(this).parent();
        $$.find('form').fadeToggle(250);
        setTimeout(function () {
            $$.find('input[name=s]').focus();
        }, 300);
    });
    $(document).on('mouseenter', '#search-icon, #search-icon-desk', function () {
        isSearchHover = true;
    }).on('mouseleave', '#search-icon, #search-icon-desk', function () {
        isSearchHover = false;
    });
});
