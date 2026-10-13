<?php
/**
 * Регистрация кастомных типов записей и таксономий
 *
 * @package custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * CPT: Портфолио
 */
add_action( 'init', 'wg_register_portfolio_cpt' );
function wg_register_portfolio_cpt() {

    $labels = [
        'name'                  => 'Портфолио',
        'singular_name'         => 'Кейс',
        'menu_name'             => 'Портфолио',
        'name_admin_bar'        => 'Кейс',
        'add_new'               => 'Добавить кейс',
        'add_new_item'          => 'Добавить новый кейс',
        'new_item'              => 'Новый кейс',
        'edit_item'             => 'Редактировать кейс',
        'view_item'             => 'Просмотреть кейс',
        'all_items'             => 'Все кейсы',
        'search_items'          => 'Искать кейсы',
        'not_found'             => 'Кейсы не найдены',
        'not_found_in_trash'    => 'В корзине кейсов нет',
        'featured_image'        => 'Обложка кейса',
        'set_featured_image'    => 'Установить обложку',
        'remove_featured_image' => 'Удалить обложку',
        'use_featured_image'    => 'Использовать как обложку',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,   // Gutenberg + REST API
        'query_var'          => true,
        'rewrite'            => [
            'slug'       => 'portfolio',
            'with_front' => false,
        ],
        'capability_type'    => 'post',
        'has_archive'        => false,  // ⚠️ ВАЖНО: архив отключён, чтобы не конфликтовать с Page /portfolio/
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ],
    ];

    register_post_type( 'portfolio', $args );
}

/**
 * Таксономия: Типы работ (portfolio_type)
 */
add_action( 'init', 'wg_register_portfolio_taxonomy' );
function wg_register_portfolio_taxonomy() {

    $labels = [
        'name'              => 'Типы работ',
        'singular_name'     => 'Тип работы',
        'search_items'      => 'Искать типы',
        'all_items'         => 'Все типы',
        'parent_item'       => 'Родительский тип',
        'parent_item_colon' => 'Родительский тип:',
        'edit_item'         => 'Редактировать тип',
        'update_item'       => 'Обновить тип',
        'add_new_item'      => 'Добавить новый тип',
        'new_item_name'     => 'Название нового типа',
        'menu_name'         => 'Типы работ',
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,   // как рубрики (чекбоксы), не как метки
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => [
            'slug'         => 'portfolio-type',
            'with_front'   => false,
            'hierarchical' => false,
        ],
    ];

    register_taxonomy( 'portfolio_type', [ 'portfolio' ], $args );
}