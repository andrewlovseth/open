<?php

    $overview = get_field('overview');
    $copy = $overview['copy'];

?>

<section class="overview | grid">

    <div class="overview__copy | copy copy-2 extended">
        <?php echo $copy; ?>
    </div>

</section>