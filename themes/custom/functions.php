<?php
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WG_VERSION', '1.0.0' );
define( 'WG_DIR', get_template_directory() );
define( 'WG_URI', get_template_directory_uri() );

require_once WG_DIR . '/inc/setup.php';
require_once WG_DIR . '/inc/enqueue.php';
require_once WG_DIR . '/inc/security.php';
require_once WG_DIR . '/inc/cleanup.php';
require_once WG_DIR . '/inc/schema.php';
require_once WG_DIR . '/inc/form.php';