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
        <div class="cta">
            <a class="btn white-outline js-form-trigger" href="#"  data-micromodal-trigger="demo">Request a Demo</a>
        </div>

        <div class="cta">
            <a class="btn white-outline js-form-trigger" href="#"  data-micromodal-trigger="contact">Contact Us</a>
        </div>
    </div>
</div>