<?php if(have_rows('leadership')): ?>

    <section class="leadership grid">
        <?php while(have_rows('leadership')) : the_row(); ?>

            <?php if( get_row_layout() == 'group' ): ?>
                <?php
                    $title = get_sub_field('title');
                    $leaders = get_sub_field('leaders');
                ?>

                <div class="leadership__group">
                    <h2 class="leadership__group-title"><?php echo $title; ?></h2>

                    <section class="leadership__grid">
                        <?php foreach( $leaders as $leader ): ?>

                            <?php
                                $photo = get_field('photo', $leader->ID);
                                $name = get_the_title( $leader->ID );
                                $slug = sanitize_title_with_dashes($name);
                                $position = get_field('position', $leader->ID);
                                $linkedin = get_field('linkedin', $leader->ID);
                                $bio = get_field('bio', $leader->ID);
                                $bio_page = get_field('bio_page', $leader->ID);
                            ?>

                            <div class="leader">
                                <div class="leader__photo<?php if(!$bio_page): ?> leader__bio-trigger<?php endif; ?>">
                                    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                                </div>

                                <div class="leader__info">
                                    <div class="leader__name">
                                        <h3 class="leader__title">
                                            <span class="leader__title-label<?php if(!$bio_page): ?> leader__bio-trigger<?php endif; ?>"><?php echo $name; ?></span>

                                            <?php if($linkedin): ?>
                                                <div class="leader__linkedin">
                                                    <a href="<?php echo $linkedin; ?>" target="_blank"><?php get_template_part('src/svg/icon-linkedin-box'); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </h3>
                                    </div>

                                    <div class="leader__position">
                                        <h4><?php echo $position; ?></h4>
                                    </div>

                                    <?php if($bio_page): ?>
                                        <?php 
                                            if( $bio_page ): 
                                            $link_url = $bio_page['url'];
                                            $link_title = $bio_page['title'];
                                            $link_target = $bio_page['target'] ? $bio_page['target'] : '_self';
                                        ?>

                                                <a class="leader__bio-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button class="leader__bio-link leader__bio-trigger">
                                            Bio
                                        </button>
                                    <?php endif; ?>
                                </div>


                                <dialog class="leader__bio">
                                    <button class="leader__bio-close" aria-label="Close bio">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
                                        </svg>
                                    </button>

                                    <div class="leader__bio-header">
                                        <div class="leader__photo">
                                            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                                        </div>

                                        <div class="leader__info">
                                            <div class="leader__name">
                                                <h3 class="leader__title">
                                                    <span class="leader__title-label"><?php echo $name; ?></span>

                                                    <?php if($linkedin): ?>
                                                        <div class="leader__linkedin">
                                                            <a href="<?php echo $linkedin; ?>" target="_blank"><?php get_template_part('src/svg/icon-linkedin-box'); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </h3>
                                            </div>

                                            <div class="leader__position">
                                                <h4><?php echo $position; ?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="leader__bio-body | copy extended">
                                        <?php echo $bio; ?>
                                    </div>
                                </dialog>
                            </div>
                        <?php endforeach; ?>
                    </section>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </section>
    
<?php endif; ?>
