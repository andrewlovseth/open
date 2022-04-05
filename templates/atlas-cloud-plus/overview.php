<?php

    $overview = get_field('overview');
    $headline = $overview['headline'];
    $deck = $overview['deck'];
    $link = $overview['cta'];
    $sidebar = $overview['sidebar'];

?>

<section class="overview grid">

    <?php if($headline): ?>
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>
    <?php endif; ?>

    <div class="info">
        <?php if($deck): ?>
            <div class="copy copy-2 deck extended">
                <?php echo $deck; ?>
            </div>
        <?php endif; ?>

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

    <div class="sidebar">
        <div class="copy copy-3 extended">
            <?php echo $sidebar; ?>
        </div>
    </div>

</section>