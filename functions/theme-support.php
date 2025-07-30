<?php

/*
	Theme Support
*/



// Theme Support for title tags, post thumbnails, HTML5 elements, feed links
add_theme_support('title-tag');


//Enable support for Post Thumbnails on posts and pages.
add_theme_support('post-thumbnails');


// Set Thumbnail Sizes
update_option( 'thumbnail_size_w', 400 );
update_option( 'thumbnail_size_h', 400 );
update_option( 'thumbnail_crop', 1 );

// Add custom image sizes for hero optimization
add_image_size( 'hero-mobile', 768, 576, true );    // 4:3 aspect ratio for mobile
add_image_size( 'hero-tablet', 1200, 514, true );   // 16:7 aspect ratio for tablet
add_image_size( 'hero-desktop', 1920, 825, true );  // 16:7 aspect ratio for desktop
add_image_size( 'hero-xl', 2560, 1100, true );      // For high-DPI displays

// Switch default core markup for search form, comment form, and comments to output valid HTML5.
add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
));


// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );


// Add support for core custom logo.
add_theme_support('custom-logo', array(
    'height'      => 250,
    'width'       => 250,
    'flex-width'  => true,
    'flex-height' => true,
));


// Add wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}


// Add SVG Support
function bearsmith_add_svg_support($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'bearsmith_add_svg_support');


// Remove Comment
function bearsmith_remove_comments_from_admin_menu() {
  remove_menu_page( 'edit-comments.php' );
}
add_action('admin_menu', 'bearsmith_remove_comments_from_admin_menu');


// Remove unneccesarry header info
function bearsmith_remove_header_info() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'wp_resource_hints', 2 );
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'bearsmith_remove_header_info');




// Remove WP-embed.js
function bearsmith_remove_wp_embed_js() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'bearsmith_remove_wp_embed_js');

function bearsmith_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog';
    $submenu['edit.php'][16][0] = 'Blog Tags';
}
add_action( 'admin_menu', 'bearsmith_change_post_label' );

function bearsmith_change_post_object() {
    global $wp_post_types;
    $labels = $wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add Blog';
    $labels->add_new_item = 'Add Blog';
    $labels->edit_item = 'Edit Blog';
    $labels->new_item = 'Blog';
    $labels->view_item = 'View Blog';
    $labels->search_items = 'Search Blog';
    $labels->not_found = 'No Blog found';
    $labels->not_found_in_trash = 'No Blog found in Trash';
    $labels->all_items = 'All Blog';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';

    $wp_post_types['post']->menu_icon = 'dashicons-rss';
} 
add_action( 'init', 'bearsmith_change_post_object' );



function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search-input" placeholder="What are you searching for?" />
    <input type="submit" id="search-submit" class="search-submit" value="'. esc_attr__( 'Search' ) .'" />
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


function formatBytes($bytes) {
    if ($bytes > 0) {
        $i = floor(log($bytes) / log(1024));
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
    } else {
        return 0;
    }
}


function hexToRgb($hex, $alpha = false) {
   $hex      = str_replace('#', '', $hex);
   $length   = strlen($hex);
   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
   if ( $alpha ) {
      $rgb['a'] = $alpha;
   }
   return implode(array_keys($rgb)) . '(' . implode(', ', $rgb) . ')';
}



// Disable Update Email Notifications	
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );
add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );
 
function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
	if ( ! empty( $type ) && $type == 'success' ) {
		return false;
	}
	return true;
}