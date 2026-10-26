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


/**
 * FAQPage Schema для /services/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'services' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Какие сайты вы создаёте?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Мы разрабатываем лендинги, интернет-магазины, корпоративные сайты и сайты-визитки. Работаем под ключ: от прототипа до запуска и SEO-оптимизации.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько стоит разработка сайта в Гродно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Стоимость зависит от типа сайта: лендинг — от 800 BYN, корпоративный сайт — от 1500 BYN, интернет-магазин — от 2500 BYN. Точную цену называем после брифа — бесплатно.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько времени занимает разработка?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Лендинг — 5–7 дней, корпоративный сайт — 2–3 недели, интернет-магазин — 4–6 недель. Сроки фиксируем в договоре.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Есть ли гарантия на сайт?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, мы даём гарантию 12 месяцев на вёрстку и функционал. После запуска сопровождаем проект: обновления, доработки, консультации.',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );