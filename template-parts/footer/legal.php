<?php

    $copyright = get_field('footer_copyright', 'options');

?>

<div class="legal">
    <div class="copyright copy copy-4">
        <p><?php echo $copyright; ?></p>
    </div>

    <div class="legal__links copy copy-4">

        <?php if(have_rows('footer_legal_links', 'options')): while(have_rows('footer_legal_links', 'options')): the_row(); ?>
        
            <?php 
                $link = get_sub_field('link');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            
                <a class="legal-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo esc_html($link_title); ?>
                </a>

            <?php endif; ?>

        <?php endwhile; endif; ?>   

    </div>
</div>