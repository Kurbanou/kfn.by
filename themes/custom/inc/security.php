<?php
// inc/security.php — безопасность

if ( ! defined( 'ABSPATH' ) ) exit;

// Скрыть версию WP
remove_action( 'wp_head', 'wp_generator' );

// Убрать лишнее из head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

// Отключить XML-RPC (если не используешь)
add_filter( 'xmlrpc_enabled', '__return_false' );

// Убрать ошибки логина
add_filter( 'login_errors', fn() => __( 'Ошибка входа.', 'mytheme' ) );

// Отключить file editing в админке
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
    define( 'DISALLOW_FILE_EDIT', true );
}