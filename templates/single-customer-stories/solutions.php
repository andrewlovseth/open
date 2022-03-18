<?php if(have_rows('solutions')): ?>

    <div class="solutions in-use">

        <div class="section-header">
            <h3 class="module-title">Solutions In Use</h3>
        </div>

        <?php while(have_rows('solutions')): the_row(); ?>

            <?php

                $solution = get_sub_field('solution');
                $label_override = get_sub_field('label_override');
                $search = get_field('search', $solution->ID);
                $photo = $search['photo'];
                $description = $search['description'];
                $label = $search['label'];

                if($label_override) {
                    $title = $label_override;
                } elseif($search['title']) {
                    $title = $search['title'];
                } else {
                    $title = get_the_title( $solution->ID );
                }     

            ?>

            <div class="solution item">
                <a href="<?php echo get_permalink( $solution->ID ); ?>">
                    <div class="photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
                    </div>

                    <div class="info">
                        <h4><?php echo $title; ?></h4>
                    </div>        
                </a>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>