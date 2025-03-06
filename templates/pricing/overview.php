<?php

    $copy = get_field("fact_sheet_copy");
    
?>

<section class="overview grid">
    <div class="overview__grid">

        <?php // get_template_part('templates/pricing/essentials'); ?>

        <?php get_template_part('templates/pricing/professional'); ?>

        <?php get_template_part('templates/pricing/comprehensive'); ?>

        <div class="fact-sheet-link | copy copy-3">
            <?php echo $copy; ?>
        </div>
    </div>
</section>