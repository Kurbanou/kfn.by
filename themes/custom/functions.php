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