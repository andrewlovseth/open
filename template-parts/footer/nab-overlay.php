<?php

    $nab_overlay = get_field('nab_overlay', 'options');
    $link = $nab_overlay['link'];
    $graphic = $nab_overlay['graphic'];
    $show = $nab_overlay['show'];

    if($show == TRUE): 

?>

    <div class="modal nab-modal micromodal-slide" id="nab" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">

                <header class="modal__header">
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>

                <div class="modal__content" id="nab-modal-content">
                    <a href="<?php echo esc_url($link); ?>" rel="external">
                        <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>