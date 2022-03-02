<?php if(have_rows('documents')): ?>

    <div class="documents">
        <?php while(have_rows('documents')): the_row(); ?>

            <?php
                $document = get_sub_field('file');
                $file = $document['url'];
                $title = $document['title'];
            ?>
    
            <div class="cta document">
                <a class="btn blue" href="<?php echo $file; ?>" target="window"><?php echo $title; ?></a>
            </div>

        <?php endwhile; ?>
    </div>

<?php endif; ?>