<?php

function bearsmith_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive('resources') ) {
       $query->set( 'posts_per_page', 16 );
    }

    if ( is_tax('resource_type') ) {
       $query->set( 'posts_per_page', 16 );
    }
}
add_filter( 'pre_get_posts', 'bearsmith_posts_per_page' );