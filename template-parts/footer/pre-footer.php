<?php

    $pre_footer = get_field('pre_footer', 'options');
    $headline = $pre_footer['headline'];
    $features = $pre_footer['features'];
    $ctas = $pre_footer['ctas'];

?>

<div class="pre-footer">
  
    <div class="info">
        <div class="headline">
            <h3><?php echo $headline; ?></h3>
        </div>

        <ul>
            <?php foreach($features as $feature): ?>

                <li>
                    <span class="checkmark"><?php get_template_part('src/svg/icon-checkmark'); ?></span>
                    <span class="text"><?php echo $feature['feature']; ?></span>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>

    <div class="ctas">
        <?php foreach($ctas as $cta): ?>

            <?php 
                $link = $cta['cta'];
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <div class="cta">
                    <a class="btn white-outline" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>

            <?php endif; ?>

        <?php endforeach; ?>
    </div>

</div>