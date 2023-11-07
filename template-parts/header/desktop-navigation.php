<?php if(have_rows('header_mobile_nav', 'options')): ?>
    
    <nav class="desktop-nav">
        <ul class="desktop-nav__list" role="navigation">

            <?php while(have_rows('header_mobile_nav', 'options')) : the_row(); ?>

                <?php if( get_row_layout() == 'section' ): ?>

                    <?php 
                        $section_toggle = get_sub_field('section_toggle');
                        $section_slug = sanitize_title_with_dashes($section_toggle);
                        $links = get_sub_field('links');
                        $featured = get_sub_field('featured');
                        if($featured === true) {
                            $featured_state = "true";
                        } else {
                            $featured_state = "false";
                        }

                    ?>

                    <?php if($section_toggle): ?>
                        <li class="desktop-nav__list-item" data-subnav="true" data-featured="<?php echo $featured_state; ?>">
                                <a href="#" class="desktop-nav__link" data-section-id="<?php echo $section_slug; ?>"><?php echo $section_toggle; ?></a>

                                <ul class="desktop-nav__sub-nav"  role="navigation" data-section="<?php echo $section_slug; ?>" data-state="inactive">
                                    <?php if(have_rows('links')): while(have_rows('links')): the_row(); ?>
                                                                
                                        <?php 
                                            $link = get_sub_field('link');
                                            if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        
                                            <li class="desktop-nav__sub-nav-item">
                                                <a class="desktop-nav__sub-nav-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                            </li>

                                        <?php endif; ?>                            

                                    <?php endwhile; endif; ?>
                                </ul>
                            </li>

                    <?php else: ?>

                        <li class="desktop-nav__list-item" data-subnav="false" data-featured="<?php echo $featured_state; ?>">
                            <?php if(have_rows('links')): while(have_rows('links')): the_row(); ?>                    
                                
                                <?php 
                                    $link = get_sub_field('link');
                                    if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                
                                    <a class="desktop-nav__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>

                                <?php endif; ?>                            

                            <?php endwhile; endif; ?>
                        </li>

                    <?php endif; ?>

                <?php endif; ?>

            <?php endwhile; ?>
        

        </ul>
    </nav>        

<?php endif; ?>