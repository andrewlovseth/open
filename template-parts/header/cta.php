<?php
    $header = get_field('header', 'options');
	$link = $header['cta'];
	if( $link ): 
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';

 ?>

 	<div class="cta navigation-cta">
 		<a class="btn blue" href="<?php echo esc_url($link_url); ?>">
            <?php echo esc_html($link_title); ?>
        </a>
 	</div>

<?php endif; ?>


