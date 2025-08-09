<?php

// Enqueue custom styles and scripts
function bearsmith_enqueue_styles_and_scripts() {
    // Use stylesheet_* for child-theme safe paths
    $base_uri  = get_stylesheet_directory_uri() . '/dist/css';
    $base_path = get_stylesheet_directory() . '/dist/css';

    // 1) Global (always)
    $global_uri  = $base_uri . '/global.css';
    $global_path = $base_path . '/global.css';
    if (file_exists($global_path)) {
        wp_enqueue_style('theme-global', $global_uri, [], filemtime($global_path));
    }

    // 2) Determine slug by convention
    $slug = null;

    // Search results (must be checked FIRST to avoid page template conflicts)
    if (is_search()) { 
        $slug = 'search'; 
    }

    // Post type archives
    if (!$slug && is_post_type_archive()) {
        $pt = get_query_var('post_type');
        if (is_array($pt)) { $pt = reset($pt); }
        if ($pt) { $slug = "archive-$pt"; }
    }

    // Taxonomy archives (optional but handy)
    if (!$slug && is_tax()) {
        $tax = get_queried_object();
        if ($tax && !empty($tax->taxonomy)) {
            $slug = "archive-tax-{$tax->taxonomy}";
        }
    }

    // Blog home, category, tag (optional)
    if (!$slug && is_home()) { $slug = 'archive-post'; }
    if (!$slug && is_category()) { $slug = 'archive-category'; }
    if (!$slug && is_tag()) { $slug = 'archive-tag'; }

    // Page templates (template-*.php → templates/<slug>.css)
    if (!$slug) {
        $tpl = get_page_template_slug();
        if ($tpl) {
            // e.g. 'templates/template-home.php' → 'template-home'
            $slug = basename($tpl, '.php');
            // Remove 'templates/' prefix if it exists
            if (strpos($slug, 'templates/') === 0) {
                $slug = str_replace('templates/', '', $slug);
            }
        }
    }

    // Singles
    if (!$slug && is_singular()) {
        $pt = get_post_type();
        if ($pt) { $slug = "single-$pt"; }
    }

    // Default page fallback
    if (!$slug && is_page()) {
        $slug = 'page-default';
    }

    // Debug: Add HTML comment to see what template is detected
    echo "<!-- Template slug detected: '$slug' -->\n";

    // 3) Enqueue the template CSS if present
    if ($slug) {
        $template_rel  = "/templates/{$slug}.css";
        $template_uri  = $base_uri . $template_rel;
        $template_path = $base_path . $template_rel;

        if (file_exists($template_path)) {
            wp_enqueue_style("template-{$slug}", $template_uri, ['theme-global'], filemtime($template_path));
            echo "<!-- Template CSS enqueued: $template_uri -->\n";
        } else {
            echo "<!-- Template CSS not found: $template_path -->\n";
        }
    }

    // Enqueue JavaScript
    $script_url = get_stylesheet_directory_uri() . '/src/js/main.js';


        wp_enqueue_script('micromodal-scripts', 'https://unpkg.com/micromodal/dist/micromodal.min.js', array(), false, true );


    wp_enqueue_script(
        'main-js', 
        $script_url, 
        array(), 
        filemtime(get_stylesheet_directory() . '/src/js/main.js'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'bearsmith_enqueue_styles_and_scripts' );

add_action('wp_head', function () {
  // preconnects
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
  // async-load the stylesheet
  $url = 'https://fonts.googleapis.com/css2?family=Anton&family=Rubik:wght@300;400;700&family=Oooh+Baby&display=swap';
  echo '<link rel="preload" as="style" href="'.esc_url($url).'" onload="this.onload=null;this.rel=\'stylesheet\'">';
  echo '<noscript><link rel="stylesheet" href="'.esc_url($url).'"></noscript>';
}, 1);


add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
function add_module_to_my_script($tag, $handle, $src) {
    if ('main-js' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

// Add resource hints for reCAPTCHA to improve performance (non-blocking)
function bearsmith_add_recaptcha_resource_hints() {
    // Only add hints on front-end, not admin
    if (is_admin()) {
        return;
    }
    
    echo '<link rel="preconnect" href="https://www.google.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://www.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="//www.google.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//www.gstatic.com">' . "\n";
}
add_action('wp_head', 'bearsmith_add_recaptcha_resource_hints', 1);

// Dequeue auto-loaded reCAPTCHA scripts from plugins to prevent conflicts
function bearsmith_dequeue_plugin_recaptcha_scripts() {
    // Only on front-end, not admin
    if (is_admin()) {
        return;
    }
    
    // Common reCAPTCHA script handles used by plugins
    $recaptcha_handles = array(
        'google-recaptcha',
        'google-recaptcha-v3',
        'grecaptcha',
        'recaptcha-api',
        'recaptcha-v3',
        'recaptcha',
        'google-captcha',
        'recaptcha-js',
        'wp-recaptcha',
        'contact-form-7-recaptcha'
    );
    
    foreach ($recaptcha_handles as $handle) {
        wp_dequeue_script($handle);
        wp_deregister_script($handle);
    }
}
add_action('wp_enqueue_scripts', 'bearsmith_dequeue_plugin_recaptcha_scripts', 100);

add_action('wp_head', function () {
  echo '<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>';
  echo '<link rel="preconnect" href="https://www.google-analytics.com" crossorigin>';
  echo '<link rel="dns-prefetch" href="//www.googletagmanager.com">';
  echo '<link rel="dns-prefetch" href="//www.google-analytics.com">';
  
  // Add resource hints for Swiper CDN to improve performance
  echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>';
  echo '<link rel="dns-prefetch" href="//cdn.jsdelivr.net">';
  
  // Preload Swiper JS for critical pages to reduce loading delay
  if (is_page(array(26, 'home-2023'))) {
    echo '<link rel="modulepreload" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js">';
  }
}, 1);


// 1) Convert RB2B <script src="...reb2b.js.gz"> into a delayed placeholder
// Delay RB2B no matter how it's inserted via ACF.
function od_delay_rb2b_html($html) {
  if (!$html) return $html;

  // 1) External script URL variants (covers s3-us-west-2 & s3.us-west-2)
  $pattern_src = '#<script([^>]*?)\ssrc=("|\')(https?://s3[-\.]us-west-2\.amazonaws\.com/b2bjsstore/[^"\']*reb2b\.js(?:\.gz)?)\\2([^>]*)></script>#i';
  $html = preg_replace(
    $pattern_src,
    '<script type="text/plain" data-delayed-rb2b src="$3"></script>',
    $html
  );

  // 2) Inline loaders that create the RB2B <script> dynamically
  //    Look for "b2bjsstore" or "reb2b" in inline script content.
  $pattern_inline = '#<script(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is';
  $html = preg_replace_callback($pattern_inline, function($m){
    $code = $m[1];
    if (stripos($code, 'b2bjsstore') !== false || stripos($code, 'reb2b') !== false) {
      // convert to inert text/plain so it won't execute until we activate it
      return '<script type="text/plain" data-delayed-rb2b-inline>'. $code .'</script>';
    }
    return $m[0];
  }, $html);

  return $html;
}

add_action('wp_footer', function(){ ?>
<script>
(function(){
  function activateRB2B(){
    if (window.__rb2bActivated) return;
    window.__rb2bActivated = true;

    // 1) External placeholders -> real <script src=...>
    document.querySelectorAll('script[type="text/plain"][data-delayed-rb2b]').forEach(function(s){
      var t = document.createElement('script');
      t.async = true;
      t.src = s.getAttribute('src');
      s.replaceWith(t);
    });

    // 2) Inline placeholders -> real inline <script> (executes now)
    document.querySelectorAll('script[type="text/plain"][data-delayed-rb2b-inline]').forEach(function(s){
      var t = document.createElement('script');
      t.text = s.text || s.textContent || '';
      s.replaceWith(t);
    });
  }

  // First interaction (best for LCP)
  ['scroll','mousemove','keydown','touchstart','pointerdown'].forEach(function(evt){
    window.addEventListener(evt, activateRB2B, { once:true, passive:true });
  });

  // Fallback: a bit after load
  window.addEventListener('load', function(){ setTimeout(activateRB2B, 3000); });
})();
</script>
<?php });