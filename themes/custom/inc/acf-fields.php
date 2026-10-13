<?php
/**
 * ACF: поля для CPT «Портфолио»
 *
 * @package custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Группа полей для кейса портфолио
 */
add_action( 'acf/init', 'wg_register_portfolio_fields' );
function wg_register_portfolio_fields() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( [
        'key'    => 'group_portfolio',
        'title'  => 'Детали кейса',
        'fields' => [

            [
                'key'          => 'field_portfolio_client',
                'label'        => 'Клиент',
                'name'         => 'portfolio_client',
                'type'         => 'text',
                'placeholder'  => 'Например: ООО «МебельГродно»',
                'instructions' => 'Название компании или имя клиента',
                'required'     => 0,
            ],

            [
                'key'          => 'field_portfolio_url',
                'label'        => 'URL сайта',
                'name'         => 'portfolio_url',
                'type'         => 'url',
                'placeholder'  => 'https://example.by',
                'instructions' => 'Ссылка на живой сайт (если есть)',
                'required'     => 0,
            ],

            [
                'key'          => 'field_portfolio_short',
                'label'        => 'Краткое описание',
                'name'         => 'portfolio_short',
                'type'         => 'textarea',
                'rows'         => 3,
                'maxlength'    => 200,
                'instructions' => 'До 200 символов — выводится в карточке на главной и в архиве',
                'required'     => 0,
            ],

            [
                'key'          => 'field_portfolio_tasks',
                'label'        => 'Что сделали',
                'name'         => 'portfolio_tasks',
                'type'         => 'wysiwyg',
                'media_upload' => 0,
                'tabs'         => 'all',
                'toolbar'      => 'basic',
                'instructions' => 'Задачи проекта: дизайн, вёрстка, интеграции и т.д.',
                'required'     => 0,
            ],

            [
                'key'          => 'field_portfolio_result',
                'label'        => 'Результат',
                'name'         => 'portfolio_result',
                'type'         => 'textarea',
                'rows'         => 3,
                'instructions' => 'Например: «Конверсия выросла в 2 раза, трафик +40%»',
                'required'     => 0,
            ],

     // ── Обложка проекта ─────────────────────────────
            [
                'key'           => 'field_portfolio_cover',
                'label'         => 'Обложка проекта',
                'name'          => 'portfolio_cover',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'instructions'  => 'Главная картинка кейса — выводится в карточке архива и на главной',
                'required'      => 0,
            ],

        ],
        'location' => [
            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'portfolio',
                ],
            ],
        ],
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ] );
}