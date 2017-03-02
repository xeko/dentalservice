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
    <body <?php body_class('drawer drawer--left'); ?>>
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
            <header class="drawer-navbar drawer-navbar--fixed" role="banner">
                <div class="container">
                    <div class="drawer-navbar-header">
                        <a href="<?php echo home_url() ?>" class="drawer-brand"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" width="120" /></a>
                        <button type="button" class="drawer-toggle drawer-hamburger">
                            <span class="sr-only">toggle navigation</span>
                            <span class="drawer-hamburger-icon"></span>
                        </button>

                        <ul class="pull-right hidden-lg hidden-md list-inline list-unstyled" id="btn-mobile">
                            <li><a href="tel:12"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                            <li>
                                <div id="search-icon">
                                    <div id="search-icon-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <form method="get" class="searchform" role="search">
                                        <input type="text" class="field" name="s">
                                    </form>
                                </div><!--End #search-icon-->
                            </li>
                        </ul><!--End #btn-mobile-->
                    </div>
                    <nav class="drawer-nav" role="navigation">
                        <?php echo main_nav() ?>
                    </nav>
                </div>

            </header>                                
