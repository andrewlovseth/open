<?php

    if(is_post_type_archive('resources')) {
        $resources = get_field('resources', 'options');
        $page_header = $resources['page_header'];
        $headline = $page_header['headline'];
        $copy = $page_header['copy'];
    } elseif(is_tax('resource_type')) {
        $queried_object = get_queried_object();
        $sub_headline = "Resources";
        $headline = $queried_object->name;
        $copy = $queried_object->description;
    }

?>

<section class="page-header grid">
    <?php if($sub_headline): ?>
        <span class="sub-headline"><?php echo $sub_headline; ?></span>
    <?php endif; ?>

    <div class="headline">
        <h1 class="page-title dark-blue"><?php echo $headline; ?></h1>
    </div>

    <div class="copy copy-2 extended secondary-color">
        <?php echo $copy; ?>
    </div>
    
    <a href="#" class="resource-filters-toggle js-resources-sidebar-toggle" data-show="+ Show Resource Filters" data-hide="– Hide Resource Filters">
        + Show Resource Filters
    </a>
</section>