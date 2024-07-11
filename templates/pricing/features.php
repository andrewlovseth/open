<?php

    $essentials_link = get_field('essentials_sales_link');
    $comprehensive_link = get_field('comprehensive_sales_link');
    $features_notes = get_field('features_notes');

?>

<section class="features grid">

    <?php if(have_rows('features')): ?>

        <table class="features__table">
            <thead class="features__table-thead">
                <tr class="features__table-tr">
                    <th class="features__table-th name">Feature</th>
                    <th class="features__table-th product essentials">Essentials</th>
                    <th class="features__table-th product comprehensive">Comprehensive</th>
                </tr>
            </thead>

            <tbody class="features__table-tbody">
                <?php while(have_rows('features')): the_row(); ?>

                    <?php
                        $name = get_sub_field('name');
                        $essentials = get_sub_field('essentials');
                        $essentials_note = get_sub_field('essentials_note');
                        $comprehensive = get_sub_field('comprehensive');
                    ?>

                    <tr class="features__table-tr">
                        <td class="features__table-td name"><?php echo $name; ?></td>
                        <td class="features__table-td product essentials">
                            <?php if($essentials_note): ?>
                                <span class="note"><?php echo $essentials_note; ?></span>                            
                            <?php elseif($essentials == TRUE): ?>
                                <?php get_template_part('src/svg/green-check'); ?>
                            <?php else: ?>
                            <?php endif; ?>                            
                        </td>
                        <td class="features__table-td product comprehensive">
                            <?php if($comprehensive == TRUE): ?>
                                <?php get_template_part('src/svg/green-check'); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile;  ?>

                <tr class="features__table-tr footer-row">
                    <td class="features__table-td name">&nbsp;</td>
                    <td class="features__table-td product essentials">
                        <?php 
                            if( $essentials_link ): 
                            $essentials_link_url = $essentials_link['url'];
                            $essentials_link_title = $essentials_link['title'];
                            $essentials_link_target = $essentials_link['target'] ? $essentials_link['target'] : '_self';
                        ?>

                            <div class="cta">
                                <a class="btn alt" href="<?php echo esc_url($essentials_link_url); ?>" target="<?php echo esc_attr($essentials_link_target); ?>"><?php echo esc_html($essentials_link_title); ?></a>
                            </div>

                        <?php endif; ?>
                    </td>
                    <td class="features__table-td product comprehensive">
                        <?php 
                            if( $comprehensive_link ): 
                            $comprehensive_link_url = $comprehensive_link['url'];
                            $comprehensive_link_title = $comprehensive_link['title'];
                            $comprehensive_link_target = $comprehensive_link['target'] ? $comprehensive_link['target'] : '_self';
                        ?>

                            <div class="cta">
                                <a class="btn alt" href="<?php echo esc_url($comprehensive_link_url); ?>" target="<?php echo esc_attr($comprehensive_link_target); ?>"><?php echo esc_html($comprehensive_link_title); ?></a>
                            </div>

                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

    <?php endif; ?>

    <div class="features__notes copy copy-2">
        <?php echo $features_notes; ?>
    </div>

</section>