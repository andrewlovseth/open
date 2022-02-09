<?php

    $overview = get_field('overview');
    $headline = $overview['headline'];
    $deck = $overview['deck'];

?>

<section class="overview grid">
    <div class="headline">
        <h1 class="section-title"><?php echo $headline; ?></h1>
    </div>

    <div class="copy copy-1 deck">
        <p><?php echo $deck; ?></p>
    </div>

</section>