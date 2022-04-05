<?php

    $graphic = get_field('service_desktop_graphic');

?>

<div class="services-desktop">
    <div class="graphic">
        <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
    </div>    

    <?php if(have_rows('services')): $count = 1; $index = 0; while(have_rows('services')) : the_row(); ?>

        <?php if( get_row_layout() == 'service' ): ?>

            <?php
                $icon = get_sub_field('icon_desktop');
                $name = get_sub_field('name');
                $slug = sanitize_title_with_dashes($name);
                $copy = get_sub_field('copy');
                $key_color = get_sub_field('key_color');
            ?>

            <a href="#" class="service service-<?php echo $count; ?> js-ac-plus-modal" data-micromodal-trigger="ac-plus-modal" data-slide-index="<?php echo $index; ?>" data-color="<?php echo $key_color; ?>">
                <div class="icon">
                    <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                </div>

                <div class="info">
                    <h3 class="module-title"><?php echo $name; ?></h3>

                    <div class="link-label">More Info ></div>
                </div>
            </a>

        <?php endif; ?>

    <?php $count++; $index++; endwhile; endif; ?>

    <div class="modal ac-plus-modal micromodal-slide" id="ac-plus-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="ac-plus-modal-modal-title" >

                <header class="modal__header">
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>

                <div class="modal__content" id="ac-plus-modal-modal-content">

                    <div class="swiper">
                        <div class="swiper-wrapper">

                            <?php if(have_rows('services')): $count = 1; while(have_rows('services')) : the_row(); ?>

                                <?php if( get_row_layout() == 'service' ): ?>

                                    <?php
                                        $icon = get_sub_field('icon_mobile');
                                        $name = get_sub_field('name');
                                        $slug = sanitize_title_with_dashes($name);
                                        $copy = get_sub_field('copy');
                                        $key_color = get_sub_field('key_color');
                                    ?>

                                    <div class="swiper-slide service-<?php echo $slug; ?> item-<?php echo $count; ?>">
                                        <div class="content-wrapper">
                                            <div class="icon">
                                                <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                                            </div>
                                            <div class="info">
                                                <div class="headline">
                                                    <h3 class="section-title"><?php echo $name; ?></h3>

                                                </div>
                                                
                                                <div class="copy copy-2 secondary-color extended">
                                                    <?php echo $copy; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                <?php endif; ?>

                            <?php $count++; endwhile; endif; ?>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>