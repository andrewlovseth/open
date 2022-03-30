<?php

    $opendrives_anywhere = get_field('opendrives_anywhere');
    $section_header = $opendrives_anywhere['section_header'];
    $logo = $opendrives_anywhere['logo'];
    $section_sub_header = $opendrives_anywhere['section_sub_header'];
    $copy = $opendrives_anywhere['copy'];
    $photo = $opendrives_anywhere['photo'];
    $link = $opendrives_anywhere['link'];

?>

<section class="opendrives-anywhere grid">

    <div class="section-header center">
        <h2 class="section-title"><?php echo $section_header; ?></h2>

        <div class="logo">
            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
        </div>
        
        <h3 class="copy copy-2"><?php echo $section_sub_header; ?></h3>
    </div>

    <div class="photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>

    <div class="copy copy-2 extended">
        <?php echo $copy; ?>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="cta">
                <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>

</section>