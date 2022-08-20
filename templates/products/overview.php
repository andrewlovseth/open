<?php

    $overview = get_field('overview');
    $headline = $overview['headline'];
    $deck = $overview['deck'];

?>

<section class="overview grid" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1600" data-aos-once="true">
    <div class="headline">
        <h1 class="section-title"><?php echo $headline; ?></h1>
    </div>

    <div class="copy copy-1 deck">
        <p><?php echo $deck; ?></p>
    </div>

</section>