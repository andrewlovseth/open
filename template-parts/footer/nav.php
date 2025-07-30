<?php

    $social_header = get_field('footer_social_header', 'options');
    $badges = get_field('footer_badges', 'options');

?>

<nav class="footer-nav">

    <?php if(have_rows('footer_nav', 'options')): while(have_rows('footer_nav', 'options')) : the_row(); ?>

        <?php if( get_row_layout() == 'column' ): ?>

            <div class="column">
                <div class="header">
                    <h4><?php echo get_sub_field('header'); ?></h4>
                </div>                

                <?php if(have_rows('links')): ?>
                    <ul class="navigation">
                        <?php while(have_rows('links')): the_row(); ?>

                            <?php 
                                $link = get_sub_field('link');
                                if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>

                                <li>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </li>

                            <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>             
            </div>

        <?php endif; ?>

    <?php endwhile; endif; ?>

    <div class="column">
        <div class="header">
            <h4><?php echo $social_header; ?></h4>
        </div>

        <div class="social">
            <ul class="navigation">
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
                            <a aria-label="Go to <?php echo $link_title; ?>" class="social-link <?php echo $link_slug; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <?php get_template_part('src/svg/icon-' . $link_slug); ?>
                            </a>
                        </li>

                    <?php endif; ?>

                <?php endwhile; endif; ?>
            </ul>

            <p>
                <?php if(have_rows('footer_phones', 'options')): while(have_rows('footer_phones', 'options')): the_row(); ?>
 
                    <span class="phone">
                        <?php echo get_sub_field('phone'); ?>
                    </span>

                <?php endwhile; endif; ?>

                <?php if(have_rows('footer_emails', 'options')): while(have_rows('footer_emails', 'options')): the_row(); ?>
 
                    <a href="mailto:<?php echo get_sub_field('email'); ?>" class="email">
                        <?php echo get_sub_field('email'); ?>
                    </a>

                <?php endwhile; endif; ?>
            </p>

            <?php if( $badges ): ?>
                <div class="badges">
                    <?php foreach( $badges as $badge ): ?>
                        <div class="badge">
                            <?php echo wp_get_attachment_image($badge['ID'], 'full'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</nav>

