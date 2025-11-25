<?php

    $under_the_hood = get_field('under_the_hood');
    $image = $under_the_hood['image'];
    $headline_1 = $under_the_hood['headline_1'];
    $copy_1 = $under_the_hood['copy_1'];
    $headline_2 = $under_the_hood['headline_2'];
    $copy_2 = $under_the_hood['copy_2'];
    $comparison_graphic_1 = get_field('comparison_graphic_1');
    $comparison_graphic_2 = get_field('comparison_graphic_2');
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
        <?php if($comparison_graphic_1 || $comparison_graphic_2): ?>
            <div class="under-the-hood__comparison">
                <?php if($comparison_graphic_1): ?>
                    <div class="under-the-hood__comparison-card-wrapper">
                        <div class="under-the-hood__comparison-card">
                            <?php if($comparison_graphic_1['headline']): ?>
                                <h3 class="under-the-hood__comparison-headline"><?php echo $comparison_graphic_1['headline']; ?></h3>
                            <?php endif; ?>

                            <div class="under-the-hood__comparison-stats">
                                <?php if($comparison_graphic_1['stat_1']): ?>
                                    <div class="under-the-hood__stat">
                                        <?php if($comparison_graphic_1['stat_1']['top']): ?>
                                            <div class="under-the-hood__stat-top"><?php echo $comparison_graphic_1['stat_1']['top']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_1['stat_1']['middle']): ?>
                                            <div class="under-the-hood__stat-middle"><?php echo $comparison_graphic_1['stat_1']['middle']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_1['stat_1']['bottom']): ?>
                                            <div class="under-the-hood__stat-bottom"><?php echo $comparison_graphic_1['stat_1']['bottom']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if($comparison_graphic_1['stat_2']): ?>
                                    <div class="under-the-hood__stat">
                                        <?php if($comparison_graphic_1['stat_2']['top']): ?>
                                            <div class="under-the-hood__stat-top"><?php echo $comparison_graphic_1['stat_2']['top']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_1['stat_2']['middle']): ?>
                                            <div class="under-the-hood__stat-middle"><?php echo $comparison_graphic_1['stat_2']['middle']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_1['stat_2']['bottom']): ?>
                                            <div class="under-the-hood__stat-bottom"><?php echo $comparison_graphic_1['stat_2']['bottom']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($comparison_graphic_2): ?>
                    <div class="under-the-hood__comparison-card-wrapper">
                        <div class="under-the-hood__comparison-card">
                            <?php if($comparison_graphic_2['headline']): ?>
                                <h3 class="under-the-hood__comparison-headline"><?php echo $comparison_graphic_2['headline']; ?></h3>
                            <?php endif; ?>

                            <div class="under-the-hood__comparison-stats">
                                <?php if($comparison_graphic_2['stat_1']): ?>
                                    <div class="under-the-hood__stat">
                                        <?php if($comparison_graphic_2['stat_1']['top']): ?>
                                            <div class="under-the-hood__stat-top"><?php echo $comparison_graphic_2['stat_1']['top']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_2['stat_1']['middle']): ?>
                                            <div class="under-the-hood__stat-middle"><?php echo $comparison_graphic_2['stat_1']['middle']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_2['stat_1']['bottom']): ?>
                                            <div class="under-the-hood__stat-bottom"><?php echo $comparison_graphic_2['stat_1']['bottom']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if($comparison_graphic_2['stat_2']): ?>
                                    <div class="under-the-hood__stat">
                                        <?php if($comparison_graphic_2['stat_2']['top']): ?>
                                            <div class="under-the-hood__stat-top"><?php echo $comparison_graphic_2['stat_2']['top']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_2['stat_2']['middle']): ?>
                                            <div class="under-the-hood__stat-middle"><?php echo $comparison_graphic_2['stat_2']['middle']; ?></div>
                                        <?php endif; ?>
                                        <?php if($comparison_graphic_2['stat_2']['bottom']): ?>
                                            <div class="under-the-hood__stat-bottom"><?php echo $comparison_graphic_2['stat_2']['bottom']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($note): ?>
            <div class="under-the-hood__note | copy copy-4 secondary-color">
                <p><?php echo $note; ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
