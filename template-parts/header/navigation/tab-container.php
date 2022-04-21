<div class="tab-container">
    <?php get_template_part('template-parts/header/navigation/initial-tab'); ?>

    <?php if(have_rows('header_nav_tabs', 'options')): while(have_rows('header_nav_tabs', 'options')) : the_row(); ?>

        <?php if( get_row_layout() == 'default_grid' ): ?>
            <?php 
                $header = get_sub_field('header');
                $slug = get_sub_field('slug');
                $parent_link = get_sub_field('parent_link');
            ?>

            <div class="tab-panel tab-<?php echo $slug; ?>" data-tab-panel="<?php echo $slug; ?>">

                <div class="tab-header">
                    <h2><?php echo $header; ?></h2>
                </div>

                <div class="nav-grid <?php echo $slug; ?>-grid">
                    <?php if(have_rows('items')): $count = 1; while(have_rows('items')): the_row(); ?>

                        <?php 
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                        ?>

                        <div class="grid-item grid-item-<?php echo $count; ?>">
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

                    <?php $count++; endwhile; endif; ?>
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

                <?php $latest = get_sub_field('latest'); if( $latest ): ?>
                    <div class="latest">
                        <div class="header">
                            <h3>The Latest</h3>
                        </div>

                        <div class="posts">
                            <?php foreach( $latest as $p ): ?>

                                <?php
                                    $post_type = get_post_type( $p->ID );
                                    $args = ['item' => $p];
                                    get_template_part('template-parts/header/navigation/latest/' . $post_type, null, $args);
                                ?>
  
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        <?php endif; ?>

    <?php endwhile; endif; ?>
</div>