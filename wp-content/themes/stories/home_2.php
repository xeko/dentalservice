<?php get_header(); ?>

<!-- section -->
<section id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>            
            </div>
            <div class="col-md-3" id="sidebar-right">
                <?php get_sidebar(); ?>    
            </div>
        </div>
    </div>        
    <?php get_footer(); ?>
</section>
<!-- /section -->

