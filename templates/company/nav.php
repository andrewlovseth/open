<?php 

    $company = get_page_by_path( "company", OBJECT, array( 'page' ) );

?>

<?php if(have_rows('company_nav', $company)): ?>
    <nav class="company-nav">
        <ul class="navigation">
            <?php while(have_rows('company_nav', $company)): the_row(); ?>
        
                <?php 
                    $link = get_sub_field('link');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </li>

                <?php endif; ?>

            <?php endwhile; ?>
        </ul>
    </nav>
<?php endif; ?>