<?php

    $contact_info = get_field('contact_info');
    $phone_numbers = $contact_info['phone_numbers'];
    $emails = $contact_info['emails'];
    $address = $contact_info['address'];
    $maps_link = $contact_info['google_maps_link'];

?>

<section class="contact-info grid">

    <div class="three-col-grid">
        <div class="col phone">
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

        <div class="col email">
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

        <div class="col address">
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

</section>