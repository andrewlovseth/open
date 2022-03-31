<section class="features grid">

    <div class="features-list">
        <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>
 
                <?php
                    $photo = get_sub_field('photo');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');

                ?>

                <div class="feature">
                    <div class="info">
                        <div class="headline">
                            <h3 class="module-title"><?php echo $headline; ?></h3>
                        </div>

                        <div class="copy copy-2 extended secondary-color">
                            <?php echo $copy; ?>
                        </div>
                    </div>

                    <div class="photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                    </div>
                </div>
                
        <?php endwhile; endif; ?>
    </div>
</section>