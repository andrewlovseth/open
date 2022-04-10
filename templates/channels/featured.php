<section class="featured grid">

    <?php $partners = get_field('featured_partners'); if( $partners ): ?>
        <div class="three-col-grid">
            <?php foreach( $partners as $partner ): ?>
                <div class="partner col">
                    <div class="logo">
                        <?php echo get_the_post_thumbnail($partner->ID); ?>
                    </div>

                    <div class="info">
                        <h3><?php echo get_the_title( $partner->ID ); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>