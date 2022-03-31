<section class="simplifies grid">
    <div class="section-header center">
        <h2 class="section-title"><?php the_field('simplifies_header'); ?></h2>
    </div>

    <div class="three-col-grid">
        <?php if(have_rows('simplifies')): while(have_rows('simplifies')): the_row(); ?>
 
            <div class="card">
                <div class="headline">
                    <h4><?php the_sub_field('headline'); ?></h4>
                </div>
                
                <div class="copy copy-2">
                    <?php the_sub_field('copy'); ?>
                </div>
                
            </div>

        <?php endwhile; endif; ?>
    </div>

</section>