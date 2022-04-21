<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $type = $args['type']; 
        $icon = $args['icon']; 
    }

    $description = get_field('description');
    $file = get_field('file');
?>

<article class="search-result resource pdf">

    <?php if($icon): ?>
        <div class="icon">
            <?php echo print_svg($icon['url']); ?>
        </div>
    <?php endif; ?>

    <div class="info">
        <?php if($type): ?>
            <h4 class="types">
                <span class="type"><?php echo $type; ?></span>
            </h4>
        <?php endif; ?>

        <div class="headline">
            <h3 class="title"><a href="<?php the_permalink(); ?>" target="window"><?php the_title(); ?></a></h3>
        </div>

        <?php if($description): ?>
            <div class="description copy copy-2 extended secondary-color">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <div class="cta">
            <a href="<?php the_permalink(); ?>" class="underline" target="window">Download <?php echo $types[0]; ?></a>
        </div>

        <?php if($file): ?>
            <?php
                $file_type = $file['subtype'];
                $file_size = $file['filesize'];
                $date_obj = DateTime::createFromFormat('Y-m-d H:i:s', $file['modified']);
                $date = $date_obj->format('m/d/Y');
            ?>

            <div class="meta copy copy-3">
                <p>
                    <?php if($file_type): ?>
                        <span class="file-type"><strong>File Type:</strong> <em><?php echo $file_type; ?></em></span>
                    <?php endif; ?>

                    <?php if($file_size): ?>             
                        <span class="file-size"><strong>File Size:</strong> <em><?php echo formatBytes($file_size, 2); ?></em></span>
                    <?php endif; ?>

                    <?php if($date): ?>
                        <span class="date"><strong>Date Modified:</strong> <em><?php echo $date; ?></em></span>
                    <?php endif; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

</article>