<?php
    $header = get_field('header', 'options');
	$link = $header['cta'];
	if( $link ): 
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';

 ?>

 	<div class="cta">
 		<a class="btn blue js-form-trigger" href="<?php echo esc_url($link_url); ?>" data-micromodal-trigger="contact">
            <?php echo esc_html($link_title); ?>
        </a>
 	</div>

<?php endif; ?>


