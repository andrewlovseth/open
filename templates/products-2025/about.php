<section class="about grid">
    <div class="about__content">
        <?php if(have_rows('about_features')): while(have_rows('about_features')) : the_row(); ?>

            <?php if( get_row_layout() == 'card' ): ?>

                <?php
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                    $id = get_sub_field('id');
                ?>

                <div class="about__card <?php echo $id; ?>">
                    <h3 class="about__card-headline"><?php echo $headline; ?></h3>
                    <div class="about__card-copy | copy copy-3 secondary-color extended">
                        <?php echo $copy; ?>
                    </div>

                    <div class="about__card-link">
                        <a href="#" class="js-modal-trigger" data-micromodal-trigger="<?php echo $id; ?>" onclick="event.preventDefault();">
                            Learn more &gt;
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>

    <?php if(have_rows('about_modals')): while(have_rows('about_modals')) : the_row(); ?>

        <?php if( get_row_layout() == 'modal' ): ?>

            <?php
                $headline = get_sub_field('headline');
                $copy = get_sub_field('copy');
                $id = get_sub_field('id');
            ?>

            <div class="modal product-modal micromodal-slide" id="<?php echo $id; ?>" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="hero-video-modal-title" >
                        <header class="modal__header">
                            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>

                        <div class="modal__content">
                            <?php get_template_part('templates/home-2025/divider'); ?>

                            <h3 class="modal__headline"><?php echo $headline; ?></h3>
                            
                            <div class="modal__copy | copy copy-3 secondary-color extended">
                                <?php echo $copy; ?>
                            </div>

                            <?php get_template_part('templates/home-2025/divider'); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    <?php endwhile; endif; ?>

</section>