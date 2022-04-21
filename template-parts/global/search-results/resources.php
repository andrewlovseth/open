<?php
    $args = wp_parse_args($args);
    if(!empty($args)) {
        $item = $args['item']; 
    }

    $terms = get_the_terms( $item->ID, 'resource_type');
    $resource_type_name = $terms[0]->name;
    $resource_type_id = $terms[0]->term_id;
    $taxonomy = $terms[0]->taxonomy;

    $resource_type = get_field('singular_label', $taxonomy . '_' . $resource_type_id);
    $icon = get_field('icon', $taxonomy . '_' . $resource_type_id);

    if($resource_type_name === "Videos") {
        $args = ['type' => $resource_type, 'icon' => $icon];
        get_template_part('template-parts/global/search-results/video', null, $args);
    } else {
        $args = ['type' => $resource_type, 'icon' => $icon];
        get_template_part('template-parts/global/search-results/pdf', null, $args);

    }
?>


