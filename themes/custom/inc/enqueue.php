<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'wg_assets' );
function wg_assets() {
    // Google Fonts
    wp_enqueue_style(
        'wg-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Основной CSS (твой перенесённый)
    wp_enqueue_style(
        'wg-style',
        WG_URI . '/assets/css/style.css',
        [ 'wg-fonts' ],
        WG_VERSION
    );

    // JS (defer уже не нужен — WP сам ставит в footer)
    wp_enqueue_script(
        'wg-main',
        WG_URI . '/assets/js/main.js',
        [],
        WG_VERSION,
        true
    );
}

// Preconnect для шрифтов
add_filter( 'wp_resource_hints', 'wg_resource_hints', 10, 2 );
function wg_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = [ 'href' => 'https://fonts.googleapis.com' ];
        $urls[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' ];
    }
    return $urls;
}