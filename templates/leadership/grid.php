<?php

    $leaders = get_field('leadership');

    if( $leaders ):

?>

    <section class="leadership grid">
        <div class="three-col-grid">
            <?php foreach( $leaders as $leader ): ?>

                <?php
                    $photo = get_field('photo', $leader->ID);
                    $name = get_the_title( $leader->ID );
                    $slug = sanitize_title_with_dashes($name);
                    $position = get_field('position', $leader->ID);
                    $bio = get_field('bio', $leader->ID);
                ?>

                <div class="leader">
                    <a href="#" class="leader-teaser" data-micromodal-trigger="leader-<?php echo $slug; ?>">
                        <div class="photo">
                            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                        </div>

                        <div class="info">
                            <div class="name">
                                <h3><?php echo $name; ?></h3>
                            </div>

                            <div class="position">
                                <h4><?php echo $position; ?></h4>
                            </div>
                        </div>                    
                    </a>

                    <div class="modal leader-modal leader-<?php echo $slug; ?> micromodal-slide" id="leader-<?php echo $slug; ?>" aria-hidden="true">
                        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                            <div class="modal__container" role="dialog" aria-modal="true">

                                <header class="modal__header">
                                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                                </header>

                                <div class="modal__content" id="leader-<?php echo $slug; ?>-modal-content">

                                    <div class="photo">
                                        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                                    </div>

                                    <div class="info">
                                        <div class="name">
                                            <h3><?php echo $name; ?></h3>
                                        </div>

                                        <div class="position">
                                            <h4><?php echo $position; ?></h4>
                                        </div>

                                        <div class="copy copy-2 extended secondary-color">
                                            <?php echo $bio; ?>
                                        </div>
                                    </div>     

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php endif; ?>