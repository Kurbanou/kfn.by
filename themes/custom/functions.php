<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // защита от прямого доступа
}

define( 'MYTHEME_VERSION', '1.0.0' );
define( 'MYTHEME_DIR', get_template_directory() );
define( 'MYTHEME_URI', get_template_directory_uri() );

require_once MYTHEME_DIR . '/inc/setup.php';
require_once MYTHEME_DIR . '/inc/enqueue.php';
require_once MYTHEME_DIR . '/inc/security.php';
require_once MYTHEME_DIR . '/inc/cleanup.php';