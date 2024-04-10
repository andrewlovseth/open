<?php

    $standards = get_field('open_standards');
    $headline = $standards['headline'];
    $copy = $standards['copy'];
    $link = $standards['link'];

?>

<section class="open-standards | grid">
    <div class="open-standards__header | section-header">
        <h3 class="open-standards__title | section-title small"><?php echo $headline; ?></h3>

        <div class="open-standards__copy | copy copy-2 extended">
            <?php echo $copy; ?>
        </div>

    </div> 
        
    <div class="features-container">
        <?php if(have_rows('features', 12)): $count = 1; while(have_rows('features', 12)) : the_row(); ?>

            <?php if( get_row_layout() == 'feature' ): ?>

                <?php
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                    $icon = get_sub_field('icon');

                ?>

                <div class="feature feature-<?php echo $count; ?>">
                    <div class="icon">
                        <?php echo print_svg($icon['url']); ?>
                    </div>

                    <div class="info">
                        <div class="info-wrapper">
                            <div class="headline">
                                <h3 class="module-title"><?php echo $headline; ?></h3>
                            </div>

                            <div class="copy copy-2">
                                <?php echo $copy; ?>
                            </div>
                        </div>
                    </div>                   
                </div>

            <?php endif; ?>

        <?php $count++; endwhile; endif; ?>
    </div>


    <?php 
        if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    ?>

        <div class="open-standards__cta | cta">
            <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        </div>

    <?php endif; ?>





</section>