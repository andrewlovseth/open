<?php

    $series = get_field('series');
    $headline = $series['headline'];
    $copy = $series['copy'];
    $photo = $series['photo'];

?>

<section class="series grid">

    <div class="section-header">            
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>

        <div class="copy copy-2 deck">
            <p><?php echo $copy; ?></p>
        </div>

        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'large'); ?>
        </div>
    </div>

    <div class="series-table">
        <?php if(have_rows('series_table')): while(have_rows('series_table')) : the_row(); ?>

            <?php if( get_row_layout() == 'series' ): ?>

                <?php
                    $logo = get_sub_field('logo');
                    $features = get_sub_field('features');
                    $link = get_sub_field('cta');

                ?>

                <div class="series">
                    <div class="logo">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </div>

                    <div class="copy copy-2 features">
                        <?php echo $features; ?>
                    </div>

                    <?php 
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <div class="cta">
                            <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>

                    <?php endif; ?>
                    
                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>

</section>