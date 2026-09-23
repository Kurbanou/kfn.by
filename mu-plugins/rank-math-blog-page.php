<?php
/**
 * Plugin Name: Rank Math — метатеги для /blog/
 * Description: Подменяет Title и Description только для страницы записей (is_home)
 * Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'rank_math/frontend/title', function( $title ) {
    if ( is_home() && ! is_front_page() ) {
        return 'Блог веб-студии в Гродно — статьи о сайтах и SEO';
    }
    return $title;
}, 99 );

add_filter( 'rank_math/frontend/description', function( $description ) {
    if ( is_home() && ! is_front_page() ) {
        return 'Статьи о разработке сайтов, SEO-продвижении, WordPress и приложениях. Советы веб-студии из Гродно.';
    }
    return $description;
}, 99 );
