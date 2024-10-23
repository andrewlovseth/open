<?php

    $features_headline = get_field('features_headline');

?>

<section class="features grid">
    <div class="section-header">
        <h2 class="section-title x-small"><?php echo $features_headline; ?></h2>
    </div>

    <?php if(have_rows('features')): ?>

        <div class="features__table">
            <div class="features__table-thead">
                <div class="features__table-tr">
                    <div class="features__table-th name">
                        <h4>Feature</h4>
                        <p>Click on title below to see more info</p>
                    </div>
                    <div class="features__table-th product essentials">Essentials</div>
                    <div class="features__table-th product professional">Professional</div>
                    <div class="features__table-th product comprehensive">Comprehensive</div>
                </div>
            </div>

            <div class="features__table-tbody">
                <?php while(have_rows('features')): the_row(); ?>

                    <?php
                        $name = get_sub_field('name');
                        $copy = get_sub_field('copy');
                        $essentials = get_sub_field('essentials');
                        $professional = get_sub_field('professional');
                        $comprehensive = get_sub_field('comprehensive');
                    ?>

                    <div class="features__table-tr">
                        <div class="features__table-td name">
                            <h4><?php echo $name; ?><?php get_template_part('src/svg/icon-pricing-caret'); ?></h4>

                            <div class="features__copy | copy copy-3">
                                <p><?php echo $copy; ?></p>
                            </div>
                        </div>

                        <div class="features__table-td product essentials">
                            <div class="mobile-header mobile-header__essentials">
                                Essentials
                            </div>


                            <?php if($essentials['included'] == TRUE): ?>
                                <?php get_template_part('src/svg/icon-pricing-checkmark'); ?>
                                
                                <?php if($essentials['note']): ?>
                                    <div class="note"><?php echo $comprehensive['note']; ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php get_template_part('src/svg/icon-pricing-x'); ?>
                            <?php endif; ?>
                        </div>

                        <div class="features__table-td product professional">
                            <div class="mobile-header mobile-header__professional">
                                Professional
                            </div>

                            <?php if($professional['included'] == TRUE): ?>
                                <?php get_template_part('src/svg/icon-pricing-checkmark'); ?>

                                <?php if($professional['note']): ?>
                                    <div class="note"><?php echo $comprehensive['note']; ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php get_template_part('src/svg/icon-pricing-x'); ?>
                            <?php endif; ?>
                        </div>

                        <div class="features__table-td product comprehensive">
                            <div class="mobile-header mobile-header__comprehensive">
                                Comprehensive
                            </div>

                            <?php if($comprehensive['included'] == TRUE): ?>
                                <?php get_template_part('src/svg/icon-pricing-checkmark'); ?>

                                <?php if($comprehensive['note']): ?>
                                    <div class="note"><?php echo $comprehensive['note']; ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php get_template_part('src/svg/icon-pricing-x'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;  ?>
            </div>
        </div>

    <?php endif; ?>


</section>