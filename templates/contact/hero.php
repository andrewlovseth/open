<?php

    $hero = get_field('hero');
    $photo = $hero['image'];

    $page_header = get_field('page_header');
    $headline = $page_header['headline'];
    $copy = $page_header['copy'];

    $contact_info = get_field('contact_info');
    $phone_numbers = $contact_info['phone_numbers'];
    $emails = $contact_info['emails'];
    $address = $contact_info['address'];
    $maps_link = $contact_info['google_maps_link'];    

    $form = get_field('form');
    $shortcode = $form['shortcode'];
    
?>

<section class="hero grid">
    <div class="hero__wrapper">
        <div class="hero__info">
            <h1 class="hero__title | page-title">
                <?php echo $headline; ?>
            </h1>

            <div class="hero__copy | copy copy-1 extended">
                <?php echo $copy; ?>
            </div>

            <div class="contact-info">
                <div class="contact-info-section phone">
                    <div class="header">
                        <h3>Phone</h3>
                    </div>

                    <ul class="copy copy-2">
                        <?php foreach($phone_numbers as $phone_number): ?>
                            <?php
                                $label = $phone_number['label'];
                                $number = $phone_number['number'];
                            ?>

                            <li>
                                <?php if($label): ?>
                                    <span class="label"><?php echo $label; ?></span>
                                <?php endif; ?>

                                <?php if($number): ?>
                                    <a href="tel:<?php echo $number; ?>" class="number"><?php echo $number; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="contact-info-section email">
                    <div class="header">
                        <h3>Email</h3>
                    </div>

                    <ul class="copy copy-2">
                        <?php foreach($emails as $email): ?>
                            <?php
                                $label = $email['label'];
                                $email = $email['email'];
                            ?>

                            <li>
                                <?php if($label): ?>
                                    <span class="label"><?php echo $label; ?></span>
                                <?php endif; ?>

                                <?php if($email): ?>
                                    <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="contact-info-section address">
                    <div class="header">
                        <h3>Address</h3>
                    </div>
                    
                    <div class="copy copy-2">
                        <a href="<?php echo $maps_link; ?>" target="window">
                            <?php echo $address; ?>
                        </a>
                    </div>
                </div>
            </div>




        </div>

        <div class="hero__form" id="form">
            <?php echo $shortcode; ?>
        </div>
    </div>


    <div class="hero__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>