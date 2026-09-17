<?php
// inc/setup.php — базовая настройка

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'mytheme_setup' );
function mytheme_setup() {
    // Переводы
    load_theme_textdomain( 'mytheme', MYTHEME_DIR . '/languages' );

    // Базовые фичи
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script'
    ] );

    // Меню
    register_nav_menus( [
        'primary' => __( 'Главное меню', 'mytheme' ),
        'footer'  => __( 'Меню в подвале', 'mytheme' ),
    ] );

    // Размеры изображений
    add_image_size( 'mytheme-card', 600, 400, true );
}

// Виджеты
add_action( 'widgets_init', 'mytheme_widgets' );
function mytheme_widgets() {
    register_sidebar( [
        'name'          => __( 'Сайдбар', 'mytheme' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );
}