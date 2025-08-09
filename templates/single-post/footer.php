<section class="article-footer">
    <div class="products-and-solutions mobile">
        <?php get_template_part('templates/single-customer-stories/products'); ?>                

        <?php get_template_part('templates/single-customer-stories/solutions'); ?>                
    </div>

    <?php if(get_field('related')): ?>
        <section class="related">
            <?php get_template_part('template-parts/global/related'); ?>
        </section>
    <?php endif; ?>
    
</section>