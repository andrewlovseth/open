<?php

    $features_headline = get_field('features_headline');
    $features_cta = get_field('features_cta');

?>


<section class="features grid">

    <div class="section-header">
        <h2 class="features-section-title"><?php echo $features_headline; ?></h2>
    </div>

    <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>

        <?php
            $icon = get_sub_field('icon');
            $headline = get_sub_field('headline');
            $copy = get_sub_field('copy');
            $cta = get_sub_field('cta');
            $link = $cta['link'];
            $photo = $cta['photo'];

        ?>
    
        <div class="feature">
            <div class="icon">
                <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
            </div>
            
            <div class="info">
                <?php if($headline): ?>
                    <div class="headline">
                        <h3 class="section-title"><?php echo $headline; ?></h3>
                    </div>
                <?php endif; ?>

                <?php if($copy): ?>
                    <div class="copy copy-2 deck">
                        <?php echo $copy; ?>
                    </div>
                <?php endif; ?>

                <?php 
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <div class="cta rich-cta half">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php if($photo): ?>
                                <div class="photo">
                                    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                                </div>

                                <div class="text">
                                    <?php echo esc_html($link_title); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>

                <?php endif; ?>
            </div>
        </div>

    <?php endwhile; endif; ?>


    <?php 
        if( $features_cta ): 
        $cta_url = $features_cta['url'];
        $cta_title = $features_cta['title'];
        $cta_target = $features_cta['target'] ? $features_cta['target'] : '_self';
    ?>

        <div class="cta section-cta">
            <a class="btn blue" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_title); ?></a>
        </div>

    <?php endif; ?>



</section>