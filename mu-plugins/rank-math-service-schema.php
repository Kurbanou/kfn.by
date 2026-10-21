<?php
/**
 * Plugin Name: Rank Math — Service Schema для страниц услуг
 * Description: Добавляет Schema.org тип Service на страницы /services/, /ecommerce/, /landing/, /wordpress/, /tilda/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {

    // Только для нужных страниц (по slug)
    $service_pages = [
        'services'   => [
            'name'        => 'Услуги по разработке сайтов в Гродно',
            'description' => 'Полный комплекс услуг по созданию сайтов: лендинги, интернет-магазины, корпоративные сайты. Адаптивность, SEO, поддержка.',
        ],
        'ecommerce'  => [
            'name'        => 'Разработка интернет-магазинов в Гродно',
            'description' => 'Создание интернет-магазинов под ключ: каталог, корзина, оплата, интеграция с 1С и CRM. Оптимизация для продаж.',
        ],
        'landing'    => [
            'name'        => 'Создание лендингов в Гродно',
            'description' => 'Разработка продающих лендингов с высокой конверсией. Прототип, дизайн, вёрстка, настройка рекламы.',
        ],
        'wordpress'  => [
            'name'        => 'Разработка сайтов на WordPress в Гродно',
            'description' => 'Создание сайтов на WordPress: гибкая настройка, удобная админка, интеграция с любыми сервисами.',
        ],
        'tilda'      => [
            'name'        => 'Создание сайтов на Tilda в Гродно',
            'description' => 'Разработка сайтов на Tilda: быстро, красиво, без программирования. Примеры и стоимость.',
        ],
    ];

    // Проверяем, что мы на одной из этих страниц
    foreach ( $service_pages as $slug => $service ) {
        if ( is_page( $slug ) ) {
            $data['Service'] = [
                '@type'       => 'Service',
                '@id'         => get_permalink() . '#service',
                'name'        => $service['name'],
                'description' => $service['description'],
                'provider'    => [
                    '@id' => home_url( '/#organization' ), // Ссылка на существующий Organization
                ],
                'areaServed'  => [
                    '@type' => 'City',
                    'name'  => 'Гродно',
                ],
                'url'         => get_permalink(),
            ];
            break;
        }
    }

    return $data;

}, 99, 2 );