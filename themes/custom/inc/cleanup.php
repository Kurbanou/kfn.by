<?php
// inc/cleanup.php — чистим мусор

if ( ! defined( 'ABSPATH' ) ) exit;

// Убрать эмодзи-скрипт
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Убрать embed
add_action( 'init', function () {
    wp_deregister_script( 'wp-embed' );
} );

// Убрать oEmbed discovery links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// Убрать лишние теги из head
add_filter( 'the_generator', '__return_empty_string' );

// Убрать pingback header
add_filter( 'wp_headers', function ( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );


// Отключить глобальные стили блоков (если не используешь Gutenberg)
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
}, 20 );