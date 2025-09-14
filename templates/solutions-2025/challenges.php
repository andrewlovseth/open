<?php

$challenges = get_field('challenges');

if ($challenges):
    $headline = $challenges['headline'];
    $photo = $challenges['photo'];
    $copy_top = $challenges['copy_top'];
    $diagram = $challenges['diagram'];
    $copy_bottom = $challenges['copy_bottom'];
?>

    <section class="challenges grid">
        <div class="challenges__content">
            <?php if ($headline): ?>
                <h2 class="challenges__headline section-headline-2025 small"><?php echo $headline; ?></h2>
            <?php endif; ?>


            <?php if ($photo): ?>
                <div class="challenges__photo">
                    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                </div>
            <?php endif; ?>
        </div>        

        <?php if ($copy_top): ?>
            <div class="challenges__copy-top | copy copy-3 secondary-color extended">
                <?php echo $copy_top; ?>
            </div>
        <?php endif; ?>

        <?php if ($diagram): ?>
            <div class="challenges__diagram">
                <?php $i = 1; foreach ($diagram as $step): ?>
                    <div class="challenges__diagram-step challenges__diagram-step-<?php echo $i; ?>">
                        <?php if ($step['graphic']): ?>
                            <div class="challenges__diagram-graphic">
                                <?php echo wp_get_attachment_image($step['graphic']['ID'], 'full'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($step['copy']): ?>
                            <div class="challenges__diagram-copy | copy copy-3 extended">
                                <?php echo $step['copy']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($copy_bottom): ?>
            <div class="challenges__copy-bottom | copy copy-3 secondary-color extended">
                <?php echo $copy_bottom; ?>
            </div>
        <?php endif; ?>

        <div class="challenges__blob">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-yellow.png" role="presentation" alt="">
        </div>
    
        <img class="challenges__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-yellow-purple.png" role="presentation" alt="">
    </section>

<?php endif; ?>
