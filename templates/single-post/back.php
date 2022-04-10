<?php
    $blog = get_field('blog', 'options');
    $title = $blog['title'];
?>

<section class="back grid">
    <div class="link">
        <a href="<?php echo site_url('/blog/'); ?>"><?php echo $title; ?></a>
    </div>
</section>