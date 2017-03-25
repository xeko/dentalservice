<?php /* Template Name: Page Post Manage */ ?>
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
                $current_user = wp_get_current_user();
                $current_user->user_login;
                $userid = $current_user->ID;
                ?>
                <h4><i class="fa fa-tasks"></i> <?php echo $current_user->display_name; ?> Quản lý bài</h4>
                <a style="color:#fff;margin:10px 0;" href="<?php bloginfo("url"); ?>/dang-bai.html" class="btn btn-primary" role="button">
                    <i class="fa fa-pencil"></i> Viết bài
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr class="vnkings_hd">
                            <th>Tiêu đề</th>
                            <th>Trạng thái</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                        $vnkings = new WP_Query(array(
                            'post_status' => array('publish', 'pending'),
                            'orderby' => 'ID',
                            'order' => 'DESC',
                            'author' => $userid,
                            'paged' => $paged));
                        ?>
                        <?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
                            <?php $postid = get_the_ID(); ?>
                            <tr class="vnkings_mn">
                                <td><a target="_blank" class="vnk1" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                                <td><span class="vnk2"><?php
                                        $stt = get_post_status($postid);
                                        if ($stt == "publish") {
                                            echo "Đang mở";
                                        } else {
                                            echo "Chờ duyệt";
                                        }
                                        ?></span></td>
                                <td><a target="_blank" class="vnk3" href="<?php bloginfo('url'); ?>/sua-bai.html?id=<?php echo $postid; ?>"><i class="fa fa-pencil-square-o"></i> Sửa</a></td>
                            </tr>
    <?php endwhile;
    wp_reset_query();
    ?>
                    </tbody>
                </table>
                <?php
                if (function_exists('pagination')) {
                    pagination();
                }
                ?>
            <?php } else { ?>
                <div class="formdangnhap">
                    <div class="alert alert-warning"><strong>Bạn</strong> cần đăng nhập để quản lý bài của mình!</div>
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

