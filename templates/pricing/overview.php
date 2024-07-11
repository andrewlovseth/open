<?php

	$link = get_field('faq_links');

?>

<section class="overview grid">
    <?php get_template_part('templates/pricing/essentials'); ?>

    <?php get_template_part('templates/pricing/comprehensive'); ?>

    <div class="faqs">
        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="cta">
                <a class="o-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>

</section>