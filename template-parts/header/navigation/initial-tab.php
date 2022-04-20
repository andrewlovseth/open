<?php

    $logo = get_field('footer_logo', 'options');
    $social_header = get_field('footer_social_header', 'options');


    $what_we_do = get_field('header_what_we_do', 'options');
    $what_we_do_headline = $what_we_do['headline'];
    $what_we_do_copy = $what_we_do['copy'];

    $contact_headline = get_field('header_contact_headline', 'options');

?>

<div class="tab-panel tab-initial" data-tab-panel="initial">

    <div class="tab-header">
        <div class="logo">
            <a href="<?php echo site_url(); ?>">
                <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
            </a>
        </div>
    </div>

    <div class="content-columns">
        <div class="column copy copy-2 about">
            <div class="header">
                <h4><?php echo $what_we_do_headline; ?></h4>
            </div>
        
            <?php echo $what_we_do_copy; ?>
        </div>

        <?php if(have_rows('header_initial_tab', 'options')): while(have_rows('header_initial_tab', 'options')) : the_row(); ?>

            <?php if( get_row_layout() == 'promo' ): ?>

                <?php
                    $promo_headline = get_sub_field('headline');
                    $promo_logo = get_sub_field('logo');
                    $promo_copy = get_sub_field('details');
                    $promo_link = get_sub_field('link');
                ?>

                <div class="column copy copy-3 promo">
                    <?php if($promo_link): ?>
                        <?php 
                            $promo_link_url = $promo_link['url'];
                            $promo_link_target = $promo_link['target'] ? $promo_link['target'] : '_self';
                        ?>

                        <a href="<?php echo $promo_link_url ?>" target="<?php echo $promo_link_target ?>">
                    <?php endif; ?>

                        <div class="header">
                            <h4><?php echo $promo_headline; ?></h4>
                        </div>

                        <div class="logo">
                            <?php echo wp_get_attachment_image($promo_logo['ID'], 'full'); ?>
                        </div>

                        <?php echo $promo_copy; ?>  

                    <?php if($promo_link): ?>
                        </a>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>




        <div class="column connect">
            <div class="header">
                <h4><?php echo $contact_headline; ?></h4>
            </div>

            <div class="social">
                <ul role="navigation">
                    <?php if(have_rows('footer_social', 'options')): while(have_rows('footer_social', 'options')): the_row(); ?>
        
                        <?php 
                            $link = get_sub_field('link');
                            if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_slug = sanitize_title_with_dashes($link_title);
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                            <li>
                                <a class="social-link <?php echo $link_slug; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <?php get_template_part('src/svg/icon-' . $link_slug); ?>
                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endwhile; endif; ?>
                </ul>

                <p>
                    <?php if(have_rows('footer_phones', 'options')): while(have_rows('footer_phones', 'options')): the_row(); ?>
    
                        <span class="phone">
                            <?php the_sub_field('phone'); ?>
                        </span>

                    <?php endwhile; endif; ?>

                    <?php if(have_rows('footer_emails', 'options')): while(have_rows('footer_emails', 'options')): the_row(); ?>
    
                        <a href="mailto:<?php the_sub_field('email'); ?>" class="email">
                            <?php the_sub_field('email'); ?>
                        </a>

                    <?php endwhile; endif; ?>
                </p>
            </div>
        </div>

    </div>



</div>