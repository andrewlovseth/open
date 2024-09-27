<?php

    $hero = get_field('hero');
    $nab_logo = $hero['nab_logo'];
    $details = $hero['details'];
    $logos = $hero['logos'];
    $booth = $hero['booth'];
    $copy = $hero['copy'];
    $form = $hero['form'];

?>

<section class="hero grid">

    <div class="hero__info">
        <div class="conf-info">
            <div class="nab-logo">
                <?php echo wp_get_attachment_image($nab_logo['ID'], 'full'); ?>
            </div>

            <div class="details | copy copy-1">
                <p><?php echo $details; ?></p>
            </div>
        </div>

        <div class="logos">
            <?php echo print_svg($logos['url']); ?>
        </div>

        <div class="booth">
            <h3><?php echo $booth; ?></h3>
        </div>

        <div class="copy copy-2 extended">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="hero__form">
        <?php echo $form; ?>
    </div>

</section>