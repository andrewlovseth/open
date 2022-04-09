<?php

    $page_header = get_field('page_header');
    $headline = $page_header['headline'];
    $copy = $page_header['copy'];

?>

<section class="page-header grid">

    <div class="headline">
        <h1 class="page-title dark-blue"><?php echo $headline; ?></h1>
    </div>

    <div class="copy copy-2 extended secondary-color">
        <?php echo $copy; ?>
    </div>
    
</section>