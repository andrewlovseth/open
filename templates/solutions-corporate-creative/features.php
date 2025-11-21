<?php

    $features = get_field('features');
    $headline = $features['headline'];
    $features_col_header = $features['features_col_header'];
    $single_col_header = $features['single_col_header'];
    $dual_col_header = $features['dual_col_header'];
    $rows = $features['rows'];

    $features_col_footer = $features['features_col_footer'];
    $single_col_footer = $features['single_col_footer'];
    $dual_col_footer = $features['dual_col_footer'];    

?>

<section class="features grid">
    <?php if($headline): ?>
        <h2 class="features__headline | section-headline-2025"><?php echo $headline; ?></h2>
    <?php endif; ?>

    <?php if($rows): ?>
        <div class="features__table">
            <table>
                <thead>
                    <tr>
                        <?php if($features_col_header): ?>
                            <th class="features-col"><?php echo $features_col_header; ?></th>
                        <?php endif; ?>
                        <?php if($single_col_header): ?>
                            <th class="single-col"><?php echo $single_col_header; ?></th>
                        <?php endif; ?>
                        <?php if($dual_col_header): ?>
                            <th class="dual-col"><?php echo $dual_col_header; ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td class="features-col">
                                <?php if($row['feature']): ?>
                                    <div class="features__feature | copy copy-3">
                                        <?php echo $row['feature']; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="single-col">
                                <?php if($row['single']): ?>
                                    <span class="features__single">
                                        <?php 
                                            $single_value = strtolower($row['single']);
                                            if ($single_value === 'yes'): 
                                        ?>
                                            <?php get_template_part('src/svg/green-check-filled'); ?>
                                        <?php elseif ($single_value === 'no'): ?>
                                            <span class="features__no">×</span>
                                        <?php else: ?>
                                            <span class="features__text">
                                                <?php echo ucfirst($row['single']); ?>
                                            </span>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="dual-col">
                                <?php if($row['dual']): ?>
                                    <span class="features__dual">
                                        <?php 
                                            $dual_value = strtolower($row['dual']);
                                            if ($dual_value === 'yes'): 
                                        ?>
                                            <?php get_template_part('src/svg/green-check-filled'); ?>
                                        <?php elseif ($dual_value === 'no'): ?>
                                            <span class="features__no">×</span>
                                        <?php else: ?>
                                            <span class="features__text">
                                                <?php echo ucfirst($row['dual']); ?>
                                            </span>                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <?php if($features_col_footer): ?>
                            <td class="features-col"><?php echo $features_col_footer; ?></td>
                        <?php endif; ?>
                        <?php if($single_col_footer): ?>
                            <td class="single-col"><?php echo $single_col_footer; ?></td>
                        <?php endif; ?>
                        <?php if($dual_col_footer): ?>
                            <td class="dual-col"><?php echo $dual_col_footer; ?></td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
