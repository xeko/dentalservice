<?php /* Template Name: Page Register */ ?>
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
            <?php
            if (is_user_logged_in()) {
                $user_id = get_current_user_id();
                $current_user = wp_get_current_user();
                $profile_url = get_author_posts_url($user_id);
                $edit_profile_url = get_edit_profile_url($user_id);
                ?>
                <div class="regted">
                    Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url()); ?>">Thoát</a> không ?
                </div>
            <?php } else { ?>
                <div class="register">                    

                    <?php do_action('process_registration_form'); ?>

                    <form class="form-horizontal" method="post" role="form">
                        <div class="form-group">
                            <label class="control-label  col-sm-3" for="username">Tên đăng nhập:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Tên Đăng nhập" value="<?php echo ( isset($_POST['username']) ? $username : null ) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo ( isset($_POST['email']) ? $email : null ) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd1">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Nhập password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd2">Nhập lại Pass:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Nhập lại password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd2">Ghi chú:</label>
                            <div class="col-sm-9">
                                <textarea name="bio" class="form-control" placeholder=""><?php echo ( isset($_POST['bio']) ? $bio : null ) ?></textarea>
                            </div>
                        </div>
                        <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input name="adduser" type="submit" id="addusersub" class="btn btn-primary" value="Đăng ký" />                                
                                <?php wp_nonce_field('add-user', 'add-nonce') ?>
                                <input name="action" type="hidden" id="action" value="adduser" />
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="clearfix"></div>

            <?php edit_post_link(); ?>
        </div>
    </div>
</section><!--End #wrap-body-->

<?php
get_footer();

