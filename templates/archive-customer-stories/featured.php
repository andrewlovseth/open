<?php
    $customer_stories = get_field('customer_stories', 'options');
    $featured_posts = $customer_stories['featured'];
    if( $featured_posts ):
?>

    <section class="featured grid">
        <?php foreach( $featured_posts as $p ): ?>
            <?php
                $description = get_field('search_description', $p->ID);
            ?>
           
            <article>
                <a href="<?php echo get_permalink( $p->ID ); ?>">
                    <div class="photo">
                        <?php echo get_the_post_thumbnail($p->ID ); ?>
                    </div>

                    <div class="info">
                        <div class="info-wrapper">
                            <h3><?php echo get_the_title( $p->ID ); ?></h3>


                            <?php if($description): ?>
                                <div class="description copy copy-1">
                                    <p><?php echo $description; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>

<?php endif; ?>