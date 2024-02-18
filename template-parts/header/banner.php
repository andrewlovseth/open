<?php
    $banner = get_field('banner', 'options');
    $show = $banner['show'];
    $copy = $banner['copy'];
    $bg_color = $banner['background_color'];
    $text_color = $banner['text_color'];
    $link_color = $banner['link_color'];


    if($show):
?>
	<aside class="banner">
        <?php echo $copy; ?>

        <style>
            <?php if($bg_color): ?>
                aside.banner {
                    background-color: <?php echo $bg_color; ?>;
                }
            <?php endif; ?>

            <?php if($text_color): ?>
                aside.banner p {
                    color: <?php echo $text_color; ?>;
                }
            <?php endif; ?>

            <?php if($link_color): ?>
                aside.banner p a {
                    color: <?php echo $link_color; ?>;
                }
            <?php endif; ?>

        </style>
	</aside>
<?php endif; ?>