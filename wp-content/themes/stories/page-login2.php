<?php /* Template Name: Page Login2 */ ?>
<?php get_header(); ?>
<header class="post-header">
    <div class="post-header-inner">
        <h1 class="hidden-xs hidden-sm"><?php the_title(); ?></h1>
    </div>
    <!-- post thumbnail -->
    <?php if (has_post_thumbnail()) : // Check if Thumbnail exists?>
        <figure style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>);">                
            <?php the_post_thumbnail('full', array('class' => 'center-block', 'alt' => get_the_title())); ?>
        </figure>
    <?php endif; ?>
    <!-- /post thumbnail -->
</header><!--End .post-header-->

<section id="wrap-body">				
    <div class="container">
        <div class="row">
            <h1 class="title hidden-md hidden-lg"><?php the_title(); ?></h1>
            <?php if (is_user_logged_in()) {
                $user_id = get_current_user_id();
                $current_user = wp_get_current_user();
                $profile_url = get_author_posts_url($user_id);
                $edit_profile_url = get_edit_profile_url($user_id); ?>
                <div class="regted">
                    Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Thoát</a> không ?
                </div>
            <?php } else { ?>
                <div class="formdangnhap">
                <?php wp_login_form(); ?>
                </div>
<?php } ?>
            
            <div class="clearfix"></div>

<?php edit_post_link(); ?>
        </div>
    </div>
</section><!--End #wrap-body-->

<?php
get_footer();

