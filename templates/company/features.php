<section class="features grid">
    <div class="features-container">
        <?php if(have_rows('features')): $count = 1; while(have_rows('features')) : the_row(); ?>

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
</section>