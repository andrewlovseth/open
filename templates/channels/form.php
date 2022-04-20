<?php

    $shortcode = get_field('channel_partner_form');

?>

<div class="modal form-modal channel-modal micromodal-slide" id="channel" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">

            <header class="modal__header">
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>

                <div class="headline">
                    <h3 class="section-title">Become a Channel Partner</h3>
                </div>

                <div class="copy copy-2">

                </div>
            </header>

            <div class="modal__content opendrives-form" id="channel-modal-content">
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</div>