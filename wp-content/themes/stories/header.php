<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php
            if (wp_title('', false)) {
                echo ' :';
            }
            ?> <?php bloginfo('name'); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">        
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png" sizes="16x16" />


        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <?php wp_head(); ?>

    </head>    
    <body <?php body_class(); ?>>
        <?php if (is_home()): ?>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8&appId=685825391532285";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        <?php endif; ?>
        <div id="back2totop"></div>
        <div class='preloader'>
            <div class="loading"></div>
        </div>
        <div id="wrap-content">
            <div class="top-bar" id="top-bar">
                <div class="container">
                    <div class="row">

                        <!-- TOP BAR LEFT -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="top-bar-adress">
                                <i class="flaticon-navigation-arrow"></i> 〒105-0014 東京都港区芝2-6-3
                            </div>
                        </div>

                        <!-- TOP BAR RIGHT -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="list-inline text-right">
                                <li>
                                    <div class="top-bar-phone">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-bar-search">
                                        <input type="text" placeholder="検索" class="search" value="" />
                                        <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </li>                                
                            </ul>                            
                        </div>


                    </div>
                </div>
            </div><!--End #top-bar-->
            <header class="fixed">
                <div class="hidden-xs hidden" id="header-logo">
                    <a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" ></a>                    
                </div><!--End #header-logo-->
                <div id="navigation">
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                    <a href="tel:0364536365" class="tel hidden-md hidden-lg"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mmenu">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </button>
                                    <a href="<?php echo home_url() ?>" class="pull-left"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-nav.png" alt="Logo" width="200" /></a>
                                </div>
                                <div class="navbar-collapse collapse" id="mmenu">
                                    <?php echo main_nav() ?>                                    
                                </div><!--End #mmenu-->
                            </nav>
                        </div><!--End #navigation-->
                    </div>
                </div>
            </header>
            <!--Slide display if is homepage-->
            <?php if(is_home() || is_front_page()):?>
                <div style="position: relative; overflow: hidden; margin-top: 44px;">
                    <div id="main-slider" class="owl-carousel owl-theme owl-loaded">
                        <div class="item">
                            <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/1.jpg" alt="" title="" />
                            <div class="carousel-caption hidden">
                                <h3 data-animation="animated bounceInLeft">
                                    This is the caption for slide 1
                                </h3>
                                <h3 data-animation="animated bounceInRight">
                                    This is the caption for slide 1
                                </h3>
                                <button class="btn btn-primary btn-lg" data-animation="animated zoomInUp">Button</button>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/2.jpg" alt="" title="" />
                            <div class="carousel-caption hidden">
                                <h3 class="icon-container" data-animation="animated bounceInDown">
                                    <span class="glyphicon glyphicon-heart"></span>
                                </h3>
                                <h3 data-animation="animated bounceInUp">
                                    This is the caption for slide 2
                                </h3>
                                <button class="btn btn-primary btn-lg" data-animation="animated zoomInRight">Button</button>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/3.jpg" alt="" title="" />
                            <div class="carousel-caption hidden">
                                <h3 class="icon-container" data-animation="animated zoomIn">
                                    <span class="glyphicon glyphicon-hourglass"></span>
                                </h3>
                                <h3 data-animation="animated flipInX">
                                    This is the caption for slide 3
                                </h3>
                                <button class="btn btn-primary btn-lg" data-animation="animated lightSpeedOut">Button</button>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/4.jpg" alt="" title="" />
                            <div class="carousel-caption hidden">
                                <h3 class="icon-container" data-animation="animated zoomInLeft">
                                    <span class="glyphicon glyphicon-phone-alt"></span>
                                </h3>
                                <h3 data-animation="animated bounceInDown">
                                    This is the caption for slide 4
                                </h3>
                                <button class="btn btn-primary btn-lg" data-animation="animated lightSpeedIn">Button</button>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/5.jpg" alt="" title="" />
                            <div class="carousel-caption hidden">
                                <h3 class="icon-container" data-animation="animated rollIn">
                                    <span class="glyphicon glyphicon-yen"></span>
                                </h3>
                                <h3 data-animation="animated bounceIn">
                                    This is the caption for slide 5
                                </h3>
                                <button class="btn btn-primary btn-lg" data-animation="animated flipInX">Button</button>
                            </div>
                        </div>                    
                    </div><!--End #main-slider-->
                    <img src="<?php echo get_bloginfo('template_url') ?>/img/slider/slogan.png" alt="スローガン" class="slogan" />
                </div>
            <?php endif;?>
            <!-- /header -->                    
        