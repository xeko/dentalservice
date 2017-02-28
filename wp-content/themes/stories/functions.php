<?php
/*
 *  Author: TONGHOA | @hoatv
 *  URL: dentalservice.jp | @html5blank
 *  Custom functions, support, custom post types and more.
 */


require_once( 'inc/most-views.php' );
require_once( 'inc/post-recent.php' );

class My_Custom_Nav_Walker extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_html = '';
       parent::start_el($item_html, $item, $depth, $args);

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
           $item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
       }

       $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function main_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => FALSE,
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="drawer-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new My_Custom_Nav_Walker()
		)
	);
}

function menu_link_class($ulclass) {
   return preg_replace('/<a /', '<a class="drawer-menu-item"', $ulclass);
}
add_filter('wp_nav_menu','menu_link_class');

function lotus_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    	
        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
//        wp_enqueue_script('bootstrap');
        
        wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2', true);
        wp_enqueue_script('bxslider');
        
        if(!wp_is_mobile())
            wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.1.3', true);
        
        wp_register_script('matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '', true);
        wp_enqueue_script('matchHeight');
        
        wp_register_script('filterizr', get_template_directory_uri() . '/js/jquery.filterizr.min.js', array('jquery'), '0.7.0', true);
        wp_enqueue_script('filterizr');
        
        wp_register_script('iScroll', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js', array('jquery'), '5.1.3', true);
        wp_enqueue_script('iScroll');
        
        wp_register_script('drawer', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js', array('jquery'), '3.2.1', true);
        wp_enqueue_script('drawer');
        
        wp_register_script('shiba_js', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('shiba_js');
        
        
    }
}

// Deregister Contact Form 7 styles
add_action( 'wp_print_styles', 'aa_deregister_styles', 100 );
function aa_deregister_styles() {
    if ( ! is_page( 'inquiry' ) ) {
        wp_deregister_style( 'contact-form-7' );
    }
}

// Deregister Contact Form 7 JavaScript files on all pages without a form
add_action( 'wp_print_scripts', 'aa_deregister_javascript', 100 );
function aa_deregister_javascript() {
    if ( ! is_page( 'inquiry' ) ) {
        wp_deregister_script( 'contact-form-7' );
    }
} 

/**
* Dequeue jQuery migrate script in WordPress.
*/
function isa_remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.4.11' );
    }
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );

function lotus_styles()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('drawer', get_template_directory_uri() . '/css/drawer.min.css', array(), '3.2.1', 'all');    
    wp_enqueue_style('drawer');
    
    wp_register_style('bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), '4.1.2', 'all');
    if(is_home())
        wp_enqueue_style('bxslider');    

    wp_register_style('awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style('awesome');        
    
    wp_register_style('animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.1', 'all');
    wp_enqueue_style('animate');

    wp_register_style('style_custom', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style_custom');
}

function register_site_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Main Menu', 'lotus'),
        'footer-menu' => __('Footer Menu', 'lotus')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Blog', 'shiba2'),
        'description' => __('Widget of site', 'shiba2'),
        'id' => 'widget-blog',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ));    
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'lotus_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'lotus_styles'); // Add Theme Stylesheet
add_action('init', 'register_site_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_blog'); // Add our HTML5 Blank Custom Post Type

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// Remove jQuery Migrate Script from header and Load jQuery from Google API
function remove_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');		
	}
}
add_action('init', 'remove_wp_embed_and_jquery');

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

function create_post_type_blog()
{
    register_taxonomy_for_object_type('category', 'shiba2'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'shiba2');
    register_post_type('blogs', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Blog', 'shiba2'),
            'singular_name' => __('Blog', 'shiba2'),
            'add_new' => __('Add New', 'shiba2'),
            'add_new_item' => __('Add New Blog', 'shiba2'),
            'edit' => __('Edit', 'shiba2'),
            'edit_item' => __('Edit Blog', 'shiba2'),
            'new_item' => __('New Blog', 'shiba2'),
            'view' => __('View Blog', 'shiba2'),
            'view_item' => __('View Blog', 'shiba2'),
            'search_items' => __('Search Blog', 'shiba2'),
            'not_found' => __('No Blog found', 'shiba2'),
            'not_found_in_trash' => __('No Blog found in Trash', 'shiba2')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',            
        ) // Add Category and Post Tags support
    ));
}

function remove_api () {
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

//Remove <link rel='dns-prefetch' href='//s.w.org'> on header
remove_action( 'wp_head', 'wp_resource_hints', 2 );

//Rename image upload
function sp_sanitize_img ($filename) {
  $f=remove_accents( $filename );
  return 'shiba2_'.$f;
}
add_filter('sanitize_file_name', 'sp_sanitize_img', 10);


//Add metabox to page
add_action( 'add_meta_boxes', 'homepage_display' );

function homepage_display() {
  add_meta_box('shiba2_homepage', 'オプション', 'func_ishomepage', 'page', 'normal', 'default');
}
function func_ishomepage($post) {
    global $post;
    wp_nonce_field('is_homepage', 'is_homepage_nonce');

    $title_img =get_post_meta($post->ID,'title_via_img', true);
    $class_name = empty($title_img)? "":"visible";
    ?>
    <dl>
         <dt class="element-title">
             <label for="page_tcd_template_type">トップページを表示する。</label>
         </dt>
         <dd class="content">
             <label class="ele"><input type="checkbox" name="is_homepage" value="1" <?php checked(1, get_post_meta($post->ID, 'is_homepage', true), TRUE) ?> /> トップページを表示する。</label>
         </dd>
         <dt class="element-title">
             <label for="page_tcd_template_type">テキストの代わりに、画像を選択してください。</label>
         </dt>
         <dd class="content">
            <input class="element-upload" name="title_via_image" type="hidden" value="<?php echo $title_img?>" />
            <a href="javascript::void(0)" id="title_image_button" class="button upload-btn">Upload</a>
            <a href="" class="remove-image button after-upload <?php echo $class_name?>">Remove</a>
            <div class="image">
            	<?php if(!empty($title_img)):?>
            	<img src="<?php echo $title_img ?>" />
            	<?php endif;?>
            </div>

            <script>
            jQuery(document).ready( function( $ ) {
                var file_frame;
                $('#title_image_button').on('click', function(event){
                    event.preventDefault();
                    if ( file_frame ) {
                        file_frame.open();
                  return;
                }
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                  title: $( this ).data( 'File upload' ),
                  button: {
                    text:  'Upload' ,
                  },
                  multiple: false  // Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                  	// We set multiple to false so only get one image from the uploader
                  	attachment = file_frame.state().get('selection').first().toJSON();
                  	// set it in hidden input
	                $('.element-upload').val(attachment.url);
	                
	                $('#title_image_button').parent().find('.image').find('img').remove();
					$('#title_image_button').parent().find('.image').prepend('<img src="' + attachment.url + '" />').fadeIn();
					$('#title_image_button').parent().find('.after-upload').addClass('visible');
                });

                // Finally, open the modal
                file_frame.open();
                });

                $('.remove-image').on('click', function(e){
                	e.preventDefault();
                	$(this).parent().find('.element-upload').val('');
					$(this).parent().find('img').remove();
					$(this).parent().find('.after-upload').removeClass('visible');
                });

            });
            </script>
         </dd>
     </dl> 
    
    <?php
}

// save data from checkboxes
add_action('save_post', 'save_page_ishome');

function save_page_ishome($post_id) {

    // check if this isn't an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    
    // security check
    if (!wp_verify_nonce($_POST['is_homepage_nonce'], 'is_homepage'))
        return;
  
    if (isset($_POST['is_homepage']))
        update_post_meta($post_id, 'is_homepage', 1);
    else
        update_post_meta($post_id, 'is_homepage', 0);

    if (isset($_POST['title_via_image'])) {
    	update_post_meta($post_id, 'title_via_img', sanitize_text_field($_POST['title_via_image']));
    }
        
}

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb inner wrap cf")) {
    global $post;
    $str = '';
    if (!is_home() && !is_front_page() && !is_admin()) {
        $tagAttribute = '';
        foreach ($divOption as $attrName => $attrValue) {
            $tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
        }
        //$str.= '<div' . $tagAttribute . '>';
        $str.= '<ul class="breadcrumb breadcrumb-arrow">';
        $str.= '<li><a href="' . home_url() . '/"><i class="fa fa-home"></i><span itemprop="title"></span></a></li>';

        if (is_category()) {
            $cat = get_queried_object();
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
                }
            }
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $cat->name . '</span></li>';
        } elseif (is_single()) {
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str.='<li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
                }
            }
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($cat->term_id) . '" itemprop="url"><span itemprop="title">' . $cat->cat_name . '</span></a></li>';
            $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb">' . $post->post_title . '</li>';
        } elseif (is_page()) {
            if ($post->post_parent != 0) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_permalink($ancestor) . '" itemprop="url"><span itemprop="title">' . get_the_title($ancestor) . '</span></a></li>';
                }
            }
            $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $post->post_title . '</span></li>';
        } elseif (is_date()) {
            if (is_year()) {
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('Y') . '年</li>';
            } else if (is_month()) {
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '年</a></li>';
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('n') . '月</li>';
            } else if (is_day()) {
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '年</a></li>';
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('n') . '月</a></li>';
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('j') . '日</li>';
            }
            if (is_year() && is_month() && is_day()) {
                $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . wp_title('', false) . '</li>';
            }
        } elseif (is_search()) {
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">「' . get_search_query() . '」で検索した結果</span></li>';
        } elseif (is_author()) {
            $str .=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">投稿者 : ' . get_the_author_meta('display_name', get_query_var('author')) . '</span></li>';
        } elseif (is_tag()) {
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">タグ : ' . single_tag_title('', false) . '</span></li>';
        } elseif (is_attachment()) {
            $str.= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $post->post_title . '</span></li>';
        } elseif (is_404()) {
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>ページがみつかりません。</li>';
        } else {
            $str.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . wp_title('', true) . '</span></li>';
        }
        $str.='</ul>';
    }
    echo $str;
}

function related_post() {
    global $post;
    $max_articles = 8;  // How many articles to display
    
    echo '<div id="related-articles"><h2>関連記事</h2><ul class="list-unstyled" id="list-post">';
    
    $cnt = 0;
    
    $article_tags = get_the_tags();
    $tags_string = '';
    if ($article_tags) {
        foreach ($article_tags as $article_tag) {
            $tags_string .= $article_tag->slug . ',';
        }
    }
    $tag_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&tag=' . $tags_string);
    
    if ($tag_related_posts) {
        foreach ($tag_related_posts as $related_post) {
            $cnt++; 
            echo '<li class="child-' . $cnt . '"><div class="col-md-3 col-xs-6">';
            $image_id = get_post_thumbnail_id($related_post->ID);
            $image_url = wp_get_attachment_image_src($image_id, array(150, 120), true);
            ?>
                <a href="<?php echo get_permalink($related_post->ID) ?>" rel="bookmark" title="<?php the_title_attribute(array('post' => $related_post->ID)); ?>"><img src="<?php echo $image_url[0]; ?>" alt="" class=""/></a>
                <time class="meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_time('d-m-Y', $post->ID); ?></time>
            <?php
            echo '<a href="' . get_permalink($related_post->ID) . '" class="title">';
            echo $related_post->post_title . '</a></div></li>';
        }
    }

    // Only if there's not enough tag related articles,
    // we add some from the same category
    
    if ($cnt < $max_articles) {
        
        $article_categories = get_the_category($post->ID);
        $category_string = '';
        foreach($article_categories as $category) { 
            $category_string .= $category->cat_ID . ',';
        }
        
        $cat_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&category=' . $category_string);
        
        if ($cat_related_posts) {
            foreach ($cat_related_posts as $related_post) {
                $cnt++; 
                if ($cnt > $max_articles) break;
                echo '<li class="child-' . $cnt . '"><div class="col-md-3 col-xs-6">';
                $image_id = get_post_thumbnail_id($related_post->ID);
                $image_url = wp_get_attachment_image_src($image_id, array(150, 120), true);
                ?>
                    <a href="<?php echo get_permalink($related_post->ID) ?>" rel="bookmark" title="<?php the_title_attribute(array('post' => $related_post->ID)); ?>"><img src="<?php echo $image_url[0]; ?>" alt="" class=""/></a>
                    <time class="meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_time('d-m-Y', $post->ID); ?></time>
                <?php
                echo '<a href="' . get_permalink($related_post->ID) . '" class="title">';
                echo $related_post->post_title . '</a></div></li>';
            }
        }
    }
    
    echo '</ul></div>';
}

function get_tags_custom($args, $content){
    $tags = get_tags();
    if(!empty($tags)):
        $html = '<ul class="list-inline list-unstyled">';
        foreach ( $tags as $tag ) {
                $tag_link = get_tag_link( $tag->term_id );

                $html .= "<li><i class='fa fa-tags' aria-hidden='true'></i><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                $html .= "{$tag->name}</a></li>";
        }
        $html .= '</ul>';   
    else:
        $html .= '無し';
    endif;    
    return $html;
}

add_shortcode('all_tags', 'get_tags_custom');

function tags_by_post($ID){
    $tags = wp_get_post_tags($ID);
    $html = "<i class='fa fa-tags' aria-hidden='true'></i> ";    
    foreach ( $tags as $k => $tag ) {
            $tag_link = get_tag_link( $tag->term_id );
            $comma = ($k == count($tags) - 1) ? '': ', ';
            
            $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
            $html .= "{$tag->name}</a>".$comma;
            
            
    }
    return $html;
}
function hoatv_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >    
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="検索" />
    <button type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'hoatv_search_form' );

function hoatv_latest_sticky() { 

  /* Get all sticky posts */
  $sticky = get_option( 'sticky_posts' );

  /* Sort the stickies with the newest ones at the top */
  rsort( $sticky );

  /* Get the 5 newest stickies */
  $sticky = array_slice( $sticky, 0, 5 );

  $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
  
  if ( $the_query->have_posts() ) {
    $return .= '<ul id="top-view" class="list-unstyled">';
      while ( $the_query->have_posts() ) {
        $the_query->the_post();        
        $count = get_post_meta(get_the_ID(), 'tanaka_post_views_count', true);
        $count = empty($count)? 0: $count;
        $return .= '<li>
            <a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '" class="zoom-effect">
            <figure class="eyecatch">' . get_the_post_thumbnail(get_the_ID(), array(80, 80), array('class' => 'pull-left')) .'</figure>'. get_the_title() . '
            <ul id="post-meta" class="list-inline list-unstyled">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> ' . get_the_time("Y-m-d", get_the_ID()) . '</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> '.$count.' views</li>
                    </ul>
            ';
        $return .= '</a></li>';
    }
    $return .= '</ul>';
  } 
  wp_reset_postdata();

  return $return; 

}
add_shortcode('latest_stickies', 'hoatv_latest_sticky');

function get_instagram($atts = "", $content = "") {
    $url = "https://api.instagram.com/v1/users/3104840534/media/recent/?access_token=3104840534.1677ed0.e452372cfe244a5e94f44a3ea8314e8e";
    $content = @file_get_contents($url);
    $data = json_decode($content, true);
    ?>
    <h2 class="headline">Gallery</h2>
    <ul id="list-gal" class="bxslider">
        <?php
        if (!empty($data['data'])):
            foreach ($data['data'] as $key => $value) {
            $img_link = $value['images']['standard_resolution']['url'];
            ?>
                        <li><a href="<?php echo $value['link'] ?>" target="_blank"><img src="<?php echo $img_link; ?>" /></a></li>
            <?php } endif; ?>
    </ul><!--End list-gal-->                
        
    <?php
}


