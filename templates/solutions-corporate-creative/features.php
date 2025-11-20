<?php

    $features = get_field('features');
    $headline = $features['headline'];
    $features_col_header = $features['features_col_header'];
    $single_col_header = $features['single_col_header'];
    $dual_col_header = $features['dual_col_header'];
    $rows = $features['rows'];

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
                            <th><?php echo $features_col_header; ?></th>
                        <?php endif; ?>
                        <?php if($single_col_header): ?>
                            <th><?php echo $single_col_header; ?></th>
                        <?php endif; ?>
                        <?php if($dual_col_header): ?>
                            <th><?php echo $dual_col_header; ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td>
                                <?php if($row['feature']): ?>
                                    <div class="features__feature | copy copy-2 secondary-color">
                                        <?php echo $row['feature']; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($row['single']): ?>
                                    <span class="features__single"><?php echo ucfirst($row['single']); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($row['dual']): ?>
                                    <span class="features__dual"><?php echo ucfirst($row['dual']); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
