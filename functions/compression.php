<?php

/**
 * Text Compression Configuration
 * 
 * This file handles text compression for better performance.
 * Multiple approaches are implemented to ensure compression works
 * regardless of server configuration.
 */

// Enable GZIP compression for text-based resources
function enable_gzip_compression() {
    // Check if compression is already enabled by server
    if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
        
        // Get the current content type
        $content_type = '';
        if (function_exists('headers_list')) {
            foreach (headers_list() as $header) {
                if (stripos($header, 'Content-Type:') === 0) {
                    $content_type = $header;
                    break;
                }
            }
        }
        
        // Define compressible content types
        $compressible_types = array(
            'text/html',
            'text/css',
            'text/javascript',
            'application/javascript',
            'application/json',
            'application/xml',
            'text/xml',
            'text/plain',
            'application/x-font-woff',
            'application/x-font-woff2',
            'font/woff',
            'font/woff2'
        );
        
        // Check if current content should be compressed
        $should_compress = false;
        foreach ($compressible_types as $type) {
            if (strpos($content_type, $type) !== false) {
                $should_compress = true;
                break;
            }
        }
        
        // Apply compression if needed
        if ($should_compress && !headers_sent()) {
            // Set Vary header to help with caching
            header('Vary: Accept-Encoding');
            
            // Enable output buffering with gzip compression
            if (!ob_start('ob_gzhandler')) {
                ob_start();
            }
        }
    }
}

// Add compression headers for specific file types
function add_compression_headers() {
    if (!headers_sent()) {
        // Add headers for better compression handling
        header('Vary: Accept-Encoding');
        
        // Set cache headers for compressed content
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
            header('Content-Encoding: gzip');
        }
    }
}

// Hook into WordPress
add_action('init', 'enable_gzip_compression', 1);
add_action('wp_head', 'add_compression_headers', 1);

// Alternative: Force compression for specific content types
function force_compression_for_assets() {
    if (is_admin()) {
        return;
    }
    
    // Check if this is a CSS or JS file request
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    $is_asset = preg_match('/\.(css|js|woff|woff2|ttf|eot|svg)$/i', $request_uri);
    
    if ($is_asset && !headers_sent()) {
        // Set appropriate headers for asset compression
        header('Vary: Accept-Encoding');
        
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
            // Enable compression for assets
            if (!ob_start('ob_gzhandler')) {
                ob_start();
            }
        }
    }
}

add_action('init', 'force_compression_for_assets', 1);

/**
 * Create .htaccess rules for Apache servers
 * This function can be called to generate .htaccess rules
 */
function get_htaccess_compression_rules() {
    return '
# Enable GZIP compression
<IfModule mod_deflate.c>
    # Active compression
    SetOutputFilter DEFLATE
    # Force deflate for mangled headers
    <IfModule mod_setenvif.c>
        <IfModule mod_headers.c>
            SetEnvIfNoCase ^(Accept-EncodingRgzip)$ ^(.*)gzip(.*)$ HAVE_Accept-Encoding
            Header append Vary Accept-Encoding env=HAVE_Accept-Encoding
        </IfModule>
    </IfModule>
    # Compress all output labeled with one of the following MIME-types
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE text/javascript
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
    AddOutputFilterByType DEFLATE application/json
    AddOutputFilterByType DEFLATE application/x-font-woff
    AddOutputFilterByType DEFLATE application/x-font-woff2
    AddOutputFilterByType DEFLATE font/woff
    AddOutputFilterByType DEFLATE font/woff2
    # Remove browser bugs
    BrowserMatch ^Mozilla/4 gzip-only-text/html
    BrowserMatch ^Mozilla/4\.0[678] no-gzip
    BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
    # Don\'t compress images
    SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png|webp)$ no-gzip dont-vary
    # Make sure proxies don\'t deliver the wrong content
    Header append Vary Accept-Encoding
</IfModule>

# Enable Brotli compression (if available)
<IfModule mod_brotli.c>
    AddOutputFilterByType BROTLI_COMPRESS text/html text/plain text/xml text/css text/javascript application/javascript application/x-javascript application/json application/xml+rss application/xml application/x-font-woff application/x-font-woff2 font/woff font/woff2
</IfModule>
';
} 