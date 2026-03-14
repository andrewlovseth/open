<?php
    $banner = get_field('nab_banner_2026', 'options');
    $show = $banner['show'];

    if($show):
?>
	<aside class="banner nab-banner-2026">
        <div class="nab-banner-2026__inner">
            <div class="nab-banner-2026__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/nab-logo-2026-@2x.png" alt="NAB Show 2026" />
            </div>

            <div class="nab-banner-2026__divider" aria-hidden="true"></div>

            <div class="nab-banner-2026__text">
                <div class="nab-banner-2026__details">
                    <p>April 19-22, 2026 / Las Vegas Convention Center, Las Vegas, NV</p>
                    <p><span class="nab-banner-2026__booth">W3443-E</span> — Sports Business Hub / <span class="nab-banner-2026__booth">W1158</span> — Cabana</p>
                </div>

                <div class="nab-banner-2026__copy">
                    <p>Game day doesn't wait. Neither should your workflow. Eliminate workflow friction and monetize video with OpenDrives @ <strong>the 2026 NAB Show</strong>.</p>
                </div>
            </div>

            <div class="nab-banner-2026__cta">
                <a href="https://opendrives.ac-page.com/nabshow206?utm_source=stickybanner&utm_medium=website&utm_campaign=nab2026" target="_blank" rel="noopener noreferrer" class="nab-banner-2026__btn">SAVE MY SPOT</a>
            </div>
        </div>
	</aside>
<?php endif; ?>
