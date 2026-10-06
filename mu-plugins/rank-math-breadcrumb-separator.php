<?php
/**
 * Plugin Name: Rank Math — разделитель хлебных крошек «/»
 * Description: Заменяет символ-разделитель крошек на «/» (в интерфейсе Rank Math его нет)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'rank_math/frontend/breadcrumb/args', function( $args ) {
    $args['separator'] = ' / ';
    return $args;
} );