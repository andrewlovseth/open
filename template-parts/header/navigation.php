<nav class="site-navigation">

    <div class="link-list">
        <ul role="navigation">
            <?php if(have_rows('header_nav_links', 'options')): while(have_rows('header_nav_links', 'options')): the_row(); ?>

                <?php 
                    $type = get_sub_field('type');
                    $link = get_sub_field('link');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li>
                        <a class="type-<?php echo $type; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </li>

                <?php endif; ?>

            <?php endwhile; endif; ?>
        </ul>
    </div>

    <div class="nav-content">
        <?php if(have_rows('header_nav_tabs', 'options')): while(have_rows('header_nav_tabs', 'options')) : the_row(); ?>

            <?php if( get_row_layout() == 'default_grid' ): ?>
                <?php 
                    $slug = get_sub_field('slug');
                    $parent_link = get_sub_field('parent_link');
                ?>

                <div class="tab tab-<?php echo $slug; ?>" id="<?php echo $slug; ?>">

                    <div class="tab-header">
                        <h2>Products</h2>
                    </div>

                    <div class="nav-grid <?php echo $slug; ?>-grid">
                        <?php if(have_rows('items')): while(have_rows('items')): the_row(); ?>

                            <?php 
                                $icon = get_sub_field('icon');
                                $link = get_sub_field('link');
                            ?>

                            <div class="grid-item">
                                <?php 
                                    if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <span class="icon">
                                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                                        </span>                                        
                                        <span class="label"><?php echo esc_html($link_title); ?></span>
                                    </a>

                                <?php endif; ?>
                            </div>

                        <?php endwhile; endif; ?>
                    </div>


                    <?php 
                        if( $parent_link ): 
                        $link_url = $parent_link['url'];
                        $link_title = $parent_link['title'];
                        $link_target = $parent_link['target'] ? $link['target'] : '_self';
                    ?>

                        <div class="parent-link cta">
                            <a class="btn white-outline" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>

                    <?php endif; ?>


                    <div class="latest">
                        <div class="header">
                            <h3>The Latest</h3>
                        </div>

                        <div class="posts">
                            <div class="post">
                                <div class="photo">
                                    <img src="<?php bloginfo('template_directory'); ?>/src/images/FPO-1.jpg" alt="" />
                                </div>

                                <div class="info">
                                    <div class="type">
                                        <h5>News</h5>
                                    </div>

                                    <div class="headline">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                    </div>

                                    <div class="copy copy-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quasi ab sequi, fugiat officia eum.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="post">
                                <div class="photo">
                                    <img src="<?php bloginfo('template_directory'); ?>/src/images/FPO-2.jpg" alt="" />
                                </div>

                                <div class="info">
                                    <div class="type">
                                        <h5>Whitepaper</h5>
                                    </div>
                                    
                                    <div class="headline">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                    </div>

                                    <div class="copy copy-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quasi ab sequi, fugiat officia eum.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>

    <div class="tab-container">

    </div>

</nav>
