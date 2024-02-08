<section class="services grid">
    <div class="section-header center">
        <div class="headline">
            <h2 class="section-title"><?php echo get_field('services_headline'); ?></h2>
        </div>

        <div class="copy copy-1">
            <?php echo get_field('services_copy'); ?>
        </div>
    </div>

    <?php get_template_part('templates/atlas-cloud-plus/services-views/mobile'); ?>

    <?php get_template_part('templates/atlas-cloud-plus/services-views/desktop'); ?>
</section>