<?php

    $logo = get_field('footer_logo', 'options');
    $social_header = get_field('footer_social_header', 'options');
    $client_logos = get_field('header_initial_tab_logos', 'options');
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
                <h4>What We Do</h4>
            </div>
        
            <p>OpenDrives is leading the industry with enterprise data management and storage solutions that
allow you to do more with your data.</p>
        </div>

        <div class="column clients">
            <div class="header">
                <h4>Who We Work With</h4>
            </div>

            <div class="client-logos">
                <?php if( $client_logos ): ?>
                    <?php foreach( $client_logos as $logo ): ?>
                        <div class="client">
                            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>


        <div class="column connect">
            <div class="header">
                <h4>Let's Work Together</h4>
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