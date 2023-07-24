<?php

    $page_header = get_field('page_header');
    $headline = $page_header['headline'];
    $copy = $page_header['copy'];

?>

<section class="section-header">

    <div class="headline">
        <h1 class="page-title"><?php echo $headline; ?></h1>
    </div>

    <div class="copy copy-1 extended">
        <?php echo $copy; ?>
    </div>
    
</section>