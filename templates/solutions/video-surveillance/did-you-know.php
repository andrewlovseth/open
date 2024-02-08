<section class="did-you-know grid">

    <div class="section-header">
        <h2 class="section-title"><?php echo get_field('did_you_know_header'); ?></h2>
    </div>

    <div class="info">
        <?php if(have_rows('did_you_know')): $count = 1; while(have_rows('did_you_know')): the_row(); ?>

            <?php
                $left_border = get_sub_field('left_border');
                $copy = get_sub_field('copy');

            ?>

            <div class="copy copy-2">
                <?php echo $copy; ?>


                <?php if($left_border): ?>
                    <style>
                        .did-you-know .copy:nth-child(<?php echo $count; ?>):before {
                            content: '';
                            display: block;
                            width: 12px;
                            height: 100%;
                            background: url(<?php echo $left_border['url']; ?>) no-repeat 0 0;
                            background-size: cover;
                            position: absolute;
                            top: 0;
                            left: -12px;
                        }

                    </style>

                <?php endif; ?>

            </div>

        <?php $count++; endwhile; endif; ?>
    </div>
</section>