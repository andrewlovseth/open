<?php
$header = get_field('header', 'options');
$desktop_nav = $header['desktop_nav'];
if( $desktop_nav ): ?>

    <nav class="desktop-nav">
        <ul class="desktop-nav__list" role="navigation">

            <?php foreach($desktop_nav as $nav_link): ?>

                <?php 
                    $link = $nav_link['link'];
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_slug = sanitize_title_with_dashes($link_title);
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li class="desktop-nav__list-item">
                        <a class="desktop-nav__link desktop-nav__link-<?php echo $link_slug; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    </li>

                <?php endif; ?>

            <?php endforeach; ?>

        </ul>
    </nav>

<?php endif; ?>

