<?php

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

// Add resource hints for reCAPTCHA to improve performance (non-blocking)
function bearsmith_add_recaptcha_resource_hints() {
    // Only add hints on front-end, not admin
    if (is_admin()) {
        return;
    }
    
    echo '<link rel="preconnect" href="https://www.google.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://www.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="//www.google.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//www.gstatic.com">' . "\n";
}
add_action('wp_head', 'bearsmith_add_recaptcha_resource_hints', 1);

// Dequeue auto-loaded reCAPTCHA scripts from plugins to prevent conflicts
function bearsmith_dequeue_plugin_recaptcha_scripts() {
    // Only on front-end, not admin
    if (is_admin()) {
        return;
    }
    
    // Common reCAPTCHA script handles used by plugins
    $recaptcha_handles = array(
        'google-recaptcha',
        'google-recaptcha-v3',
        'grecaptcha',
        'recaptcha-api',
        'recaptcha-v3',
        'recaptcha',
        'google-captcha',
        'recaptcha-js',
        'wp-recaptcha',
        'contact-form-7-recaptcha'
    );
    
    foreach ($recaptcha_handles as $handle) {
        wp_dequeue_script($handle);
        wp_deregister_script($handle);
    }
}
add_action('wp_enqueue_scripts', 'bearsmith_dequeue_plugin_recaptcha_scripts', 100);

add_action('wp_head', function () {
  echo '<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>';
  echo '<link rel="preconnect" href="https://www.google-analytics.com" crossorigin>';
  echo '<link rel="dns-prefetch" href="//www.googletagmanager.com">';
  echo '<link rel="dns-prefetch" href="//www.google-analytics.com">';
  
  // Add resource hints for Swiper CDN to improve performance
  echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>';
  echo '<link rel="dns-prefetch" href="//cdn.jsdelivr.net">';
  
  // Preload Swiper JS for critical pages to reduce loading delay
  if (is_page(array(26, 'home-2023'))) {
    echo '<link rel="modulepreload" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js">';
  }
}, 1);