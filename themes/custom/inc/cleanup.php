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