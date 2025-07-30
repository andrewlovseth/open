<?php

// Enable text compression for better performance
function enable_text_compression() {
    // Only add compression headers if not already set by server
    if (!headers_sent() && !isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
        return;
    }
    
    // Check if client accepts gzip compression
    if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
        // Set compression headers for text-based resources
        $content_type = '';
        
        // Get current content type
        if (function_exists('headers_list')) {
            foreach (headers_list() as $header) {
                if (stripos($header, 'Content-Type:') === 0) {
                    $content_type = $header;
                    break;
                }
            }
        }
        
        // Apply compression to text-based content types
        $compressible_types = array(
            'text/html',
            'text/css',
            'text/javascript',
            'application/javascript',
            'application/json',
            'application/xml',
            'text/xml',
            'text/plain'
        );
        
        $should_compress = false;
        foreach ($compressible_types as $type) {
            if (strpos($content_type, $type) !== false) {
                $should_compress = true;
                break;
            }
        }
        
        if ($should_compress) {
            // Enable output buffering with gzip compression
            if (!ob_start('ob_gzhandler')) {
                ob_start();
            }
        }
    }
}
add_action('init', 'enable_text_compression', 1);

// Enqueue custom styles and scripts
function bearsmith_enqueue_styles_and_scripts() {
    $stylesheet_url = get_stylesheet_directory_uri() . '/public/main.css';
    $script_url = get_stylesheet_directory_uri() . '/src/js/main.js';

    wp_enqueue_style(
        'main-css', 
        $stylesheet_url, 
        array(), 
        filemtime(get_stylesheet_directory() . '/public/main.css')
    );


        wp_enqueue_script('micromodal-scripts', 'https://unpkg.com/micromodal/dist/micromodal.min.js', array(), false, true );


    wp_enqueue_script(
        'main-js', 
        $script_url, 
        array(), 
        filemtime(get_stylesheet_directory() . '/src/js/main.js'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'bearsmith_enqueue_styles_and_scripts' );

add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
function add_module_to_my_script($tag, $handle, $src) {
    if ('main-js' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}


/**
 * Preload hero images for better LCP performance
 */
function preload_hero_images() {
    // Only on pages that might have hero images
    if ( is_front_page() || is_page() ) {
        $hero_image_id = null;
        

        $photo = get_field('herophoto');
        if ( $photo && isset($photo['ID']) ) {
            $hero_image_id = $photo['ID'];
        }
       
        
        // If we found a hero image, preload it
        if ( $hero_image_id ) {
            $mobile_src = wp_get_attachment_image_src( $hero_image_id, 'hero-mobile' );
            if ( $mobile_src ) {
                echo '<link rel="preload" as="image" href="' . esc_url($mobile_src[0]) . '">' . "\n";
            }
        }
    }
}
add_action('wp_head', 'preload_hero_images', 1);