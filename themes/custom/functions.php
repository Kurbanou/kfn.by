<?php
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WG_VERSION', '1.0.0' );
define( 'WG_DIR', get_template_directory() );
define( 'WG_URI', get_template_directory_uri() );

require_once WG_DIR . '/inc/setup.php';
require_once WG_DIR . '/inc/enqueue.php';
require_once WG_DIR . '/inc/security.php';
require_once WG_DIR . '/inc/cleanup.php';
// require_once WG_DIR . '/inc/schema.php';
require_once WG_DIR . '/inc/form.php';
require_once WG_DIR . '/inc/post-types.php';
require_once WG_DIR . '/inc/acf-fields.php';
require_once WG_DIR . '/inc/shortcodes.php';


/**
 * Перенаправить uploads в папку темы: themes/custom/assets/uploads/
 * Все загрузки из медиатеки попадают в Git вместе с темой.
 */
add_filter( 'upload_dir', 'wg_custom_upload_dir' );
function wg_custom_upload_dir( $uploads ) {
    $uploads['basedir'] = WG_DIR . '/assets/uploads';
    $uploads['baseurl'] = WG_URI . '/assets/uploads';

    if ( ! empty( $uploads['subdir'] ) ) {
        $uploads['path'] = $uploads['basedir'] . $uploads['subdir'];
        $uploads['url']  = $uploads['baseurl'] . $uploads['subdir'];
    } else {
        $uploads['path'] = $uploads['basedir'];
        $uploads['url']  = $uploads['baseurl'];
    }

    return $uploads;
}


/**
 * Блок «Смотрите также» для страниц (перелинковка)
 */
function wg_related_pages() {
    if ( ! is_page() ) {
        return;
    }

    $current = get_the_ID();

    $related = [
        'services'  => [ 'ecommerce', 'landing', 'prices' ],
        'ecommerce' => [ 'portfolio', 'prices', 'contacts' ],
        'landing'   => [ 'portfolio', 'prices', 'contacts' ],
        'wordpress' => [ 'portfolio', 'prices', 'contacts' ],
        'tilda'     => [ 'portfolio', 'prices', 'contacts' ],
        'prices'    => [ 'services', 'portfolio', 'contacts' ],
        'about'     => [ 'services', 'portfolio', 'contacts' ],
    ];

    $slug = get_post_field( 'post_name', $current );

    if ( ! isset( $related[ $slug ] ) ) {
        return;
    }

    echo '<section class="related-pages section section--gray">';
    echo '<div class="container">';
    echo '<h2 class="section__title">Смотрите также</h2>';
    echo '<ul class="related-pages__list">';

    foreach ( $related[ $slug ] as $related_slug ) {
        $page = get_page_by_path( $related_slug );
        if ( $page ) {
            echo '<li class="related-pages__item">';
            echo '<a href="' . esc_url( get_permalink( $page ) ) . '">';
            echo esc_html( get_the_title( $page ) );
            echo ' →</a>';
            echo '</li>';
        }
    }

    echo '</ul>';
    echo '</div>';
    echo '</section>';
}

/**
 * Отключить комментарии на всём сайте
 */
add_action( 'admin_init', function() {
    update_option( 'default_comment_status', 'closed' );
    update_option( 'default_ping_status', 'closed' );
} );

add_filter( 'comments_open', '__return_false' );
add_filter( 'pings_open', '__return_false' );

add_action( 'admin_menu', function() {
    remove_menu_page( 'edit-comments.php' );
} );

add_action( 'init', function() {
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
        }
    }
} );