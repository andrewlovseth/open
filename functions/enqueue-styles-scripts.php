<?php

/*
	Enqueue Styles & Scripts
*/


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