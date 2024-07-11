<?php

    $essentials = get_field('essentials');
    $background = $essentials['background'];
    $title = $essentials['title'];
    $headline = $essentials['headline'];
    $copy = $essentials['copy'];
    $link = $essentials['link'];

 ?>

<section class="essentials overview__panel">
    <div class="overview__panel-header">
        <h2 class="overview__panel-title"><?php echo $title; ?></h2>
    </div>

    <div class="overview__panel-background">
        <?php echo wp_get_attachment_image($background['ID'], 'full'); ?>
    </div>

    <div class="overview__panel-info">
        <h3 class="overview__panel-sub-title | section-title small"><?php echo $headline; ?></h3>

        <div class="overview__panel-copy | copy copy-2 extended">
            <?php echo $copy; ?>
        </div>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="cta">
                <a class="o-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>

    <div class="overview__panel-footer"></div>
</section>