<?php if(have_rows('leadership')): ?>

    <section class="leadership grid">
        <?php while(have_rows('leadership')) : the_row(); ?>

            <?php if( get_row_layout() == 'group' ): ?>
                <?php
                    $leaders = get_sub_field('leaders');
                ?>

                <div class="leadership__group">

                    <section class="leadership__grid">
                        <?php foreach( $leaders as $leader ): ?>

                            <?php
                                $photo = get_field('photo', $leader->ID);
                                $name = get_the_title( $leader->ID );
                                $slug = sanitize_title_with_dashes($name);
                                $position = get_field('position', $leader->ID);
                                $bio = get_field('bio', $leader->ID);
                            ?>

                            <div class="leader ceo">
                                <div class="leader__photo">
                                    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                                </div>

                                <div class="leader__info">
                                    <div class="leader__name">
                                        <h3 class="leader__title"><?php echo $name; ?></h3>
                                    </div>

                                    <div class="leader__position">
                                        <h4><?php echo $position; ?></h4>
                                    </div>

                                    <div class="leader__copy | copy copy-2 extended secondary-color">
                                        <?php echo $bio; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </section>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </section>
    
<?php endif; ?>
