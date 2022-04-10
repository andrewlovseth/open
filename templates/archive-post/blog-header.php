<?php
    $blog = get_field('blog', 'options');
    $title = $blog['title'];
    $description = $blog['description'];
    $tagline = $blog['tagline'];
?>

<section class="blog-header grid">
        <div class="headline">
            <h1 class="page-title"><?php echo $title; ?></h1>
        </div>
        
        <div class="copy copy-2">
            <p><?php echo $description; ?></p>
        </div>

        <div class="tag">
            <p><?php echo $tagline; ?></p>
            <div class="logo">
                <?php $logo = get_field('footer_logo', 'options'); echo print_svg($logo['url']); ?>
            </div>
        </div>
</section>