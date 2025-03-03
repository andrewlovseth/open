<?php

    $author_type = get_field('author_type');
    $team_authors = get_field('team_author');
    $guest_author = get_field('guest_author');

?>

<?php if($author_type === 'team'): ?>
    <?php if($team_authors): ?>
        <div class="authors">

            <?php foreach($team_authors as $author): ?>
                <?php 
                    $name = get_the_title($author->ID);
                    $meta = get_field('position', $author->ID);
                    $photo = get_field('photo', $author->ID);

                ?>

                <div class="author">
                    <div class="photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'thumbnail'); ?>
                    </div>

                    <div class="info">
                        <div class="name">
                            <h3><?php echo $name; ?></h3>
                        </div>

                        <div class="meta">
                            <h4><?php echo $meta; ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>
<?php endif; ?>


<?php if($author_type === 'guest'): ?>
    <?php if($guest_author): ?>
        <div class="authors">
            <?php                
                $name = $guest_author['name'];
                $meta = $guest_author['meta'];
                $photo = $guest_author['photo'];
            ?>

            <div class="author">
                <div class="photo">
                    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                </div>

                <div class="info">
                    <div class="name">
                        <h3><?php echo $name; ?></h3>
                    </div>

                    <div class="meta">
                        <h4><?php echo $meta; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>