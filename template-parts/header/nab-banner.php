<?php
    $banner = get_field('nab_banner', 'options');
    $show = $banner['show'];
    $copy = $banner['copy'];
    $mobile_copy = $banner['mobile_copy'];
    $date_time = $banner['date_time'];
    $bg_image = $banner['background'];
    $bg_color = $banner['background_color'];
    $text_color = $banner['text_color'];
    $link_color = $banner['link_color'];
    $icon = $banner['icon'];
    $link = $banner['link'];

    if( $link ) {
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    }

    $className = 'banner nab-banner';
    if($bg_image) {
        $className .= ' bg-image';
    }
    if($bg_color) {
        $className .= ' bg-color';
    }
    if($icon) {
        $className .= ' has-icon';
    }

    if($show):
?>
	<aside class="<?php echo $className; ?>" <?php if($bg_image): ?> style="background-image: url(<?php echo $bg_image['url']; ?>);"<?php endif; ?>>
        <a class="link-wrapper" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php if($icon): ?>
                <div class="icon">
                    <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>

                    <div class="date-time">
                        <p><?php echo $date_time; ?></p>
                    </div>
                </div>				
            <?php endif; ?>

            <div class="copy">
                <div class="copy-wrapper">
                    <div class="copy__desktop">
                        <?php echo $copy; ?>
                    </div>

                    <div class="copy__mobile">
                        <?php echo $mobile_copy; ?>
                    </div>
                </div>

                <div class="cta">
                    <span class="btn orange"><?php echo $link_title; ?></span>
                </div>
            </div>
        </a>

        <style>
            <?php if($text_color): ?>
                aside.banner p {
                    color: <?php echo $text_color; ?>;
                }
            <?php endif; ?>

            <?php if($link_color): ?>
                aside.banner p strong {
                    color: <?php echo $link_color; ?>;
                }
            <?php endif; ?>
        </style>
	</aside>
<?php endif; ?>