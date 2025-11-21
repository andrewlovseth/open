<?php

    $under_the_hood = get_field('under_the_hood');
    $image = $under_the_hood['image'];
    $headline_1 = $under_the_hood['headline_1'];
    $copy_1 = $under_the_hood['copy_1'];
    $headline_2 = $under_the_hood['headline_2'];
    $copy_2 = $under_the_hood['copy_2'];
    $graphic_1 = $under_the_hood['graphic_1'];
    $graphic_2 = $under_the_hood['graphic_2'];
    $note = $under_the_hood['note'];

?>

<section class="under-the-hood grid">

    <div class="under-the-hood__top">
        <?php if($image): ?>
            <div class="under-the-hood__image">
                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="under-the-hood__top-content">
            <?php if($headline_1): ?>
                <h2 class="under-the-hood__headline-1 | section-headline-2025"><?php echo $headline_1; ?></h2>
            <?php endif; ?>

            <?php if($copy_1): ?>
                <div class="under-the-hood__copy-1 | copy copy-3 secondary-color extended">
                    <?php echo $copy_1; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div class="under-the-hood__middle">


        <?php if($headline_2): ?>
            <h3 class="under-the-hood__headline-2 | copy copy-3"><?php echo $headline_2; ?></h3>
        <?php endif; ?>

        <?php if($copy_2): ?>
            <div class="under-the-hood__copy-2 | copy copy-3 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        <?php endif; ?>

    </div>

    <div class="under-the-hood__bottom">
        <?php if($graphic_1): ?>
            <div class="under-the-hood__graphic-1">
                <?php echo wp_get_attachment_image($graphic_1['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <?php if($graphic_2): ?>
            <div class="under-the-hood__graphic-2">
                <?php echo wp_get_attachment_image($graphic_2['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <?php if($note): ?>
            <div class="under-the-hood__note | copy copy-4 secondary-color">
                <p><?php echo $note; ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
