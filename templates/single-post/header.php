<section class="article-header">
    <div class="container">
        <div class="date">
            <h4><?php the_time('l, F j, Y'); ?></h4>
        </div>

        <div class="post-title">
            <h1><?php the_title(); ?></h1>
        </div>
        
        <?php get_template_part('templates/single-post/header/author'); ?>                
        
        <?php get_template_part('template-parts/global/share-links'); ?>    
    </div>
    
    <div class="products-and-solutions desktop">
        <?php get_template_part('templates/single-customer-stories/products'); ?>                

        <?php get_template_part('templates/single-customer-stories/solutions'); ?>                
    </div>
</section>