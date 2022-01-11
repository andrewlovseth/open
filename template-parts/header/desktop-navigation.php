<?php if(have_rows('navigation', 'options')): ?>
    <nav class="desktop-nav">
        <ul class="main-nav" role="navigation">
            <?php while(have_rows('navigation', 'options')) : the_row(); ?>

                <?php if( get_row_layout() == 'basic_link' ): ?>

                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <li class="first-level">
                            <a class="main-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </li>

                    <?php endif; ?>                        

                <?php endif; ?>


                <?php if( get_row_layout() == 'dropdown' ): ?>

                    <?php 
                        $header_link = get_sub_field('header_link');
                        if( $header_link ): 
                        $header_link_url = $header_link['url'];
                        $header_link_title = $header_link['title'];
                        $header_link_target = $header_link['target'] ? $link['target'] : '_self';
                    ?>

                        <li class="first-level dropdown">
                            <a class="header-link main-link" href="<?php echo esc_url($header_link_url); ?>" target="<?php echo esc_attr($header_link_target); ?>">
                                <?php echo esc_html($header_link_title); ?>
                            </a>

                            <?php if(have_rows('sub_links')): ?>
                                <ul role="navigation" class="dropdown-menu">
                                    <?php while(have_rows('sub_links')): the_row(); ?>

                                        <?php 
                                            $link = get_sub_field('link');
                                            if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                            <li class="second-level">
                                                <a class="sub-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <?php echo esc_html($link_title); ?>
                                                </a>
                                            </li>

                                        <?php endif; ?>                                        

                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

                        </li>

                    <?php endif; ?>                        

                <?php endif; ?>

            <?php endwhile; ?>

        </ul>
    </nav>
<?php endif; ?>