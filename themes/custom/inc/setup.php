<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'wg_setup' );
function wg_setup() {
    load_theme_textdomain( 'webgrodno', WG_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script'
    ] );

    register_nav_menus( [
        'primary' => __( 'Главное меню', 'webgrodno' ),
        'footer'  => __( 'Меню в подвале', 'webgrodno' ),
    ] );
}

// Класс для <li>
add_filter( 'nav_menu_css_class', function( $classes, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        $classes[] = 'nav__item';
    }
    return $classes;
}, 10, 3 );

// Класс для <a>
add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        $atts['class'] = 'nav__link';
    }
    return $atts;
}, 10, 3 );