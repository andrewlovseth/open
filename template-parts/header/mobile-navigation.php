<nav class="mobile-nav">

    <div class="mobile-nav-wrapper">

        <span class="mobile-nav-close js-mobile-nav-close"><?php get_template_part('src/svg/icon-close') ?></span>

        <div class="mobile-nav-logo">
            <a href="<?php echo site_url(); ?>">
                <?php $logo = get_field('footer_logo', 'options'); echo print_svg($logo['url']); ?>
            </a>
        </div>

        <?php if(have_rows('header_mobile_nav', 'options')): while(have_rows('header_mobile_nav', 'options')) : the_row(); ?>

            <?php if( get_row_layout() == 'section' ): ?>

                <?php 
                    $section_toggle = get_sub_field('section_toggle');
                    $section_slug = sanitize_title_with_dashes($section_toggle);
                    $links = get_sub_field('links');
                ?>

                <?php if($section_toggle): ?>
                    <div class="mobile-nav-section dropdown">
                        <div class="mobile-nav-header">
                            <a href="#" class="js-mobile-nav-toggle mobile-nav-toggle" data-section-id="<?php echo $section_slug; ?>">
                                <span class="label"><?php echo $section_toggle; ?></span>
                                <span class="icon"><?php get_template_part('src/svg/icon-angle-down') ?></span>
                            </a>
                        </div>

                        <div class="mobile-nav-body" data-section="<?php echo $section_slug; ?>">
                            <?php if(have_rows('links')): while(have_rows('links')): the_row(); ?>
                                                        
                                <?php 
                                    $link = get_sub_field('link');
                                    if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                
                                    <div class="mobile-nav-link">
                                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    </div>

                                <?php endif; ?>                            

                            <?php endwhile; endif; ?>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="mobile-nav-section basic">
                        <?php if(have_rows('links')): while(have_rows('links')): the_row(); ?>                    
                            
                            <?php 
                                $link = get_sub_field('link');
                                if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            
                                <div class="mobile-nav-link">
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </div>

                            <?php endif; ?>                            

                        <?php endwhile; endif; ?>
                    </div>

                <?php endif; ?>

            <?php endif; ?>

        <?php endwhile; endif; ?>


			<?php get_template_part('template-parts/header/search'); ?>

    </div>



</nav>