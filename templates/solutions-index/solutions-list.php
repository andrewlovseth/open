<section class="solutions grid">

    <?php if(have_rows('solutions')): while(have_rows('solutions')): the_row(); ?>
    
        <?php
            $headline = get_sub_field('headline');
            $sub_headline = get_sub_field('sub_headline');
            $copy = get_sub_field('copy');
            $photo = get_sub_field('photo');
            $link = get_sub_field('link');
        ?>

        <div class="solution">
            <div class="photo">
                <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
            </div>

            <div class="info">
                <div class="headline">
                    <h3 class="section-title"><?php echo $headline; ?></h3>
                </div>

                <div class="sub-headline copy copy-2">
                    <h4><?php echo $sub_headline; ?></h4>
                </div>

                <div class="copy copy-2">
                    <?php echo $copy; ?>
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

        </div>

    <?php endwhile; endif; ?>

</section>