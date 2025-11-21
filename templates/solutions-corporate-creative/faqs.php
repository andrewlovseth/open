<?php

    $faqs = get_field('faqs');
    $headline = $faqs['headline'];
    $faqs_list = $faqs['faqs'];

?>

<section class="faqs grid">
    <?php if($headline): ?>
        <h2 class="faqs__headline | section-headline-2025"><?php echo $headline; ?></h2>
    <?php endif; ?>

    <?php if($faqs_list): ?>
        <div class="faqs__list">
            <?php foreach($faqs_list as $faq): ?>
                <?php if($faq['acf_fc_layout'] == 'faq'): ?>
                    <div class="faqs__item">
                        <?php if($faq['question']): ?>
                            <h3 class="faqs__question copy copy-3"><?php echo $faq['question']; ?></h3>
                        <?php endif; ?>

                        <?php if($faq['answer']): ?>
                            <div class="faqs__answer | copy copy-3 secondary-color extended">
                                <?php echo $faq['answer']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <img class="faqs__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-pink-pink-vert.png" role="presentation" alt="">

</section>
