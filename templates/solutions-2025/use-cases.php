<?php

$use_cases = get_field('use_cases');

if ($use_cases):
    $headline = $use_cases['headline'];
    $copy = $use_cases['copy'];
    $me_headline = $use_cases['me_headline'];
    $me_table = $use_cases['me_table'];
    $other_industries_headline = $use_cases['other_industries_headline'];
    $other_industries_list = $use_cases['other_industries_list'];
    $workflows_header = $use_cases['workflows_header'];
    $workflows_content = $use_cases['workflows_content'];
?>

<section class="use-cases grid">
    <div class="use-cases__content">
        <?php if ($headline): ?>
            <h2 class="use-cases__headline section-headline-2025"><?php echo $headline; ?></h2>
        <?php endif; ?>

        <?php if ($copy): ?>
            <div class="use-cases__copy | copy copy-2 secondary-color extended">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>

        <?php if ($me_headline): ?>
            <h3 class="use-cases__me-headline"><?php echo $me_headline; ?></h3>
        <?php endif; ?>

        <?php if ($me_table): ?>
            <div class="use-cases__me-table">
                <?php foreach ($me_table as $column): ?>
                    <div class="use-cases__me-column">
                        <?php if ($column['header']): ?>
                            <h4 class="use-cases__me-header"><?php echo $column['header']; ?></h4>
                        <?php endif; ?>
                        
                        <?php if ($column['copy']): ?>
                            <div class="use-cases__me-copy | copy copy-3 secondary-color extended">
                                <?php echo $column['copy']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="use-cases__other-industries">
            <?php if ($other_industries_headline): ?>
                <h3 class="use-cases__other-industries-headline"><?php echo $other_industries_headline; ?></h3>
            <?php endif; ?>

            <?php if ($other_industries_list): ?>
                <div class="use-cases__other-industries-list | copy copy-3 secondary-color extended">
                    <?php echo $other_industries_list; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($workflows_header && $workflows_content): ?>
            <div class="use-cases__workflows">
                <div class="use-cases__workflows-header">
                    <?php foreach ($workflows_header as $header): ?>
                        <div class="use-cases__workflows-header-item">
                            <?php if ($header['header']): ?>
                                <h4 class="use-cases__workflows-header-text"><?php echo $header['header']; ?></h4>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="use-cases__workflows-content">
                    <?php foreach ($workflows_content as $row): ?>
                        <div class="use-cases__workflows-row">
                            <?php if ($row['workflows']): ?>
                                <div class="use-cases__workflows-workflow copy copy-3 secondary-color extended">
                                    <?php echo $row['workflows']; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($row['use_cases']): ?>
                                <div class="use-cases__workflows-use-cases | copy copy-3 secondary-color extended">
                                    <?php echo $row['use_cases']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <img class="use-cases__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-green-yellow.png" role="presentation" alt="">

    <img class="use-cases__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-blue-4.png" role="presentation" alt="">

</section>

<?php endif; ?>
