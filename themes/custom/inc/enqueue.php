
<?php
// inc/enqueue.php — подключение стилей и скриптов
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'mytheme_assets' );
function mytheme_assets() {
    // Основной стиль
    wp_enqueue_style(
        'mytheme-main',
        MYTHEME_URI . '/assets/css/main.css',
        [],
        MYTHEME_VERSION
    );

    // style.css только для заголовка темы
    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri(),
        [ 'mytheme-main' ],
        MYTHEME_VERSION
    );

    // JS
    wp_enqueue_script(
        'mytheme-main',
        MYTHEME_URI . '/assets/js/main.js',
        [],
        MYTHEME_VERSION,
        true // в футере
    );

    // Комментарии
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}