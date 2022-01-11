<?php if(have_rows('navigation', 'options')): ?>
    <nav class="mobile-nav">
        <div class="mobile-nav-wrapper">
            <?php get_template_part('template-parts/header/logo'); ?>
            
            <ul role="navigation" class="main-links">
                <?php while(have_rows('navigation', 'options')) : the_row(); ?>
                    <?php if( get_row_layout() == 'basic_link' ): ?>

                        <?php 
                            $link = get_sub_field('link');
                            if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                            <li class="link main-link">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </li>
                        
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if( get_row_layout() == 'dropdown' ): ?>

                        <?php 
                            $header_link = get_sub_field('header_link');
                            $header_link_url = $header_link['url'];
                            $header_link_title = $header_link['title'];
                            $header_link_target = $header_link['target'] ? $link['target'] : '_self';
                            $section_header = $header_link_title;
                            $section_header_id = str_replace('’', '', $section_header);
                        ?>

                        <li class="link main-link dropdown">
                            <a href="#<?php echo sanitize_title_with_dashes($section_header_id); ?>-subnav" class="section-header">
                                <?php echo $section_header; ?>
                                <span class="arrow"><img src="<?php bloginfo('template_directory'); ?>/src/images/down-arrow.svg" alt="Down Arrow" /></span>
                            </a>

                            <ul role="navigation" id="<?php echo sanitize_title_with_dashes($section_header_id); ?>-subnav" class="sub-links">
                                <?php if(have_rows('sub_links')): while(have_rows('sub_links')) : the_row(); ?>


                                        <?php 
                                            $link = get_sub_field('link');
                                            if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>

                                            <li class="link sub-link">
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                            </li>

                                        <?php endif; ?>



                                <?php endwhile; endif; ?>
                            </ul>
                        </li>                       

                    <?php endif; ?>

                <?php endwhile; ?> 
            </ul>
        </div>
    </nav>
<?php endif; ?>
