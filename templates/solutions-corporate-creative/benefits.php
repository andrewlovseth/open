<?php

    $benefits_creatives = get_field('benefits_creatives');
    $benefits_middle = get_field('benefits_middle');
    $benefits_it = get_field('benefits_it');

?>

<section class="benefits">
    <?php if($benefits_creatives): ?>
        <div class="benefits__creatives" <?php if($benefits_creatives['background_image']): ?>style="background-image: url('<?php echo $benefits_creatives['background_image']['url']; ?>');"<?php endif; ?>>
            <?php if($benefits_creatives['headline']): ?>
                <h2 class="benefits__creatives-headline | section-headline-2025"><?php echo $benefits_creatives['headline']; ?></h2>
            <?php endif; ?>

            <?php if($benefits_creatives['benefits']): ?>
                <div class="benefits__creatives-grid">
                    <?php foreach($benefits_creatives['benefits'] as $benefit): ?>
                        <div class="benefits__creatives-item">
                            <div class="benefits__creatives-copy | copy copy-2 secondary-color">
                                <?php echo $benefit['copy']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($benefits_middle): ?>
        <div class="benefits__middle">
            <?php if($benefits_middle['headline']): ?>
                <h2 class="benefits__middle-headline | section-headline-2025"><?php echo $benefits_middle['headline']; ?></h2>
            <?php endif; ?>

            <?php if($benefits_middle['copy']): ?>
                <div class="benefits__middle-copy | copy copy-2 secondary-color extended">
                    <?php echo $benefits_middle['copy']; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($benefits_it): ?>
        <div class="benefits__it" <?php if($benefits_it['background_image']): ?>style="background-image: url('<?php echo $benefits_it['background_image']['url']; ?>');"<?php endif; ?>>
            <?php if($benefits_it['headline']): ?>
                <h2 class="benefits__it-headline | section-headline-2025"><?php echo $benefits_it['headline']; ?></h2>
            <?php endif; ?>

            <?php if($benefits_it['benefits']): ?>
                <div class="benefits__it-grid">
                    <?php foreach($benefits_it['benefits'] as $benefit): ?>
                        <div class="benefits__it-item">
                            <div class="benefits__it-copy | copy copy-2 secondary-color">
                                <?php echo $benefit['copy']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
