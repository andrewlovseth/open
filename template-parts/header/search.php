<?php

    $header = get_field('header', 'options');
    $search = $header['search'];
    $header = $search['header'];
    $queries = $search['queries'];

?>

<div class="search-container">

    <div class="search-toggle js-search-toggle">
        <?php get_template_part('src/svg/icon-search'); ?>
    </div>

    <div class="search-modal">
        <div class="search-close js-search-close">
            <?php get_template_part('src/svg/icon-close'); ?>
        </div>
    
        <?php get_search_form(); ?>

        <div class="queries">
            <div class="queries__header">
                <h5><?php echo $header; ?></h5>
            </div>

            <ul class="queries__list">
                <?php foreach($queries as $search): ?>
                    <li class="queries__list-item">
                        <a class="queries__link" href="#"><?php echo $search['query']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>