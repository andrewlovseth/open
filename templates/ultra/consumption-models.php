<?php

    $consumption_models = get_field('consumption_models');
    $section_header = $consumption_models['section_header'];

    if(have_rows('consumption_models')): while(have_rows('consumption_models')): the_row();

?>

    <section class="consumption-models grid">
        <div class="section-header">
            <h2><?php echo $section_header; ?></h2>
        </div>

        <div class="models">
            <?php if(have_rows('models')): while(have_rows('models')): the_row(); ?>
 
                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                ?>

                <div class="model<?php if($icon): ?> has-icon<?php endif; ?>">
                    <?php if($icon): ?>
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="info">
                        <div class="headline">
                            <h3><?php echo $headline; ?></h3>
                        </div>

                        <div class="copy copy-3">
                            <?php echo $copy; ?>
                        </div>
                    </div>                
                </div>

            <?php endwhile; endif; ?>
        </div>

    </section>

<?php endwhile; endif; ?>
