<?php

    $shortcode = get_field('footer_demo_form', 'options');

?>

<div class="modal form-modal demo-modal micromodal-slide" id="demo" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">

            <header class="modal__header">
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>

                <div class="headline">
                    <h3 class="section-title">Request a Demo</h3>
                </div>

                <div class="copy copy-2">

                </div>
            </header>

            <div class="modal__content opendrives-form" id="demo-modal-content">
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</div>