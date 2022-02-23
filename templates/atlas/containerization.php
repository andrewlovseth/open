<?php

$containerization = get_field('containerization');
$headline = $containerization['headline'];
$deck = $containerization['deck'];
$link = $containerization['cta'];

if(have_rows('containerization')): while(have_rows('containerization')): the_row(); ?>

    <section class="containerization grid">
        <div class="section-header">
            <h2 class="section-title"><?php echo $headline; ?></h2>

            <div class="copy copy-1">
                <?php echo $deck; ?>
            </div>
        </div>

        <div class="three-col-grid">
            <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>

                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('deck');
                ?>
        
                <div class="item center">
                    <?php if($icon): ?>
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($headline): ?>
                        <div class="headline">
                            <h3><?php echo $headline; ?></h3>
                        </div>
                    <?php endif; ?>

                    <?php if($copy): ?>
                        <div class="copy copy-2 deck">
                            <?php echo $copy; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endwhile; endif; ?>
        </div>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="cta center">
                <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>

    </section>


<?php endwhile; endif; ?>
