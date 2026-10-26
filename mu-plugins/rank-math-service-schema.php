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


/**
 * FAQPage Schema для /ecommerce/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'ecommerce' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Какие функции будут в моём интернет-магазине?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Каталог товаров с фильтрами, корзина, оформление заказа, личный кабинет, онлайн-оплата, интеграция с 1С и CRM, автоматический расчёт доставки.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Можно ли интегрировать магазин с 1С?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, мы настраиваем интеграцию с 1С для автоматической синхронизации товаров, остатков и цен. Также подключаем CRM (amoCRM, Bitrix24) и платёжные системы.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько стоит интернет-магазин в Гродно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Базовый интернет-магазин — от 2500 BYN. С интеграциями (1С, CRM, эквайринг) — от 5000 BYN. Точная стоимость зависит от количества товаров и функций.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Как долго делается интернет-магазин?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Стандартный срок — 4–6 недель. Если нужен срочный запуск, можем сделать за 3 недели (с ограниченным функционалом на старте).',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );


/**
 * FAQPage Schema для /landing/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'landing' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Чем лендинг отличается от обычного сайта?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Лендинг — это одна страница с чёткой целью: получить заявку, продать товар или услугу. В отличие от многостраничника, он фокусирует внимание на одном действии и даёт более высокую конверсию.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько стоит лендинг в Гродно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Лендинг под ключ — от 800 BYN. В стоимость входит: прототип, дизайн, вёрстка, адаптивность, форма заявки и базовая SEO-настройка.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'За сколько дней сделаете лендинг?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Стандартный срок — 5–7 дней. Если нужно срочно — можем сделать за 3 дня (при готовом контенте).',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Поможете с рекламой лендинга?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, мы настраиваем рекламу в Google Ads и Яндекс.Директ, а также помогаем с аналитикой (Google Analytics, Яндекс.Метрика). Можно заказать лендинг + рекламу под ключ.',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );


/**
 * FAQPage Schema для /wordpress/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'wordpress' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Почему WordPress, а не другая CMS?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'WordPress — самая популярная CMS в мире (43% всех сайтов). Она гибкая, безопасная, с огромным выбором плагинов и тем. Легко масштабируется и удобна для редактирования контента без программиста.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Можно ли сделать интернет-магазин на WordPress?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, через WooCommerce — это бесплатный плагин, который превращает WordPress в полноценный интернет-магазин с корзиной, оплатой и доставкой.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько стоит сайт на WordPress в Гродно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Сайт-визитка — от 500 BYN, корпоративный сайт — от 1500 BYN, интернет-магазин на WooCommerce — от 2500 BYN. Точная стоимость — после брифа.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Будет ли сайт на WordPress быстрым и безопасным?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, мы настраиваем кэширование, оптимизируем изображения (WebP), устанавливаем SSL и плагины безопасности. В результате — быстрый и защищённый сайт.',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );

/**
 * FAQPage Schema для /tilda/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'tilda' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Чем Tilda отличается от WordPress?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Tilda — это конструктор сайтов без программирования. Быстрый запуск (1–3 дня), красивый дизайн «из коробки». Идеально для лендингов и сайтов-визиток. WordPress — гибче, но требует больше времени на разработку.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Сколько стоит сайт на Tilda в Гродно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Лендинг на Tilda — от 600 BYN, сайт-визитка — от 800 BYN. В стоимость входит: дизайн, наполнение, адаптивность, подключение домена и настройка аналитики.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Можно ли на Tilda сделать интернет-магазин?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, Tilda поддерживает каталог товаров и приём оплаты. Но для больших магазинов (1000+ товаров) лучше подойдёт WooCommerce или отдельная платформа.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'За сколько дней сделаете сайт на Tilda?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Стандартный срок — 3–5 дней. Если контент готов — можем сделать за 1–2 дня.',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );

/**
 * FAQPage Schema для /prices/
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( is_page( 'prices' ) ) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'От чего зависит стоимость сайта?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Стоимость зависит от типа сайта, количества страниц и блоков, сложности дизайна, функционала (формы, интеграции, личный кабинет) и сроков. Чем проще задача — тем ниже цена.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Можно ли сделать сайт дешевле?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Да, есть варианты: использовать готовый шаблон вместо уникального дизайна, сократить количество страниц или запустить MVP (минимальную версию) с последующей доработкой.',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Что входит в стоимость?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'В стоимость входит: бриф, прототип, дизайн, вёрстка, программирование, SEO-база, тестирование, запуск и поддержка в первый месяц. Полный список — в блоке «Что входит в стоимость».',
                    ],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Есть ли скрытые доплаты?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Нет. Мы фиксируем стоимость в договоре до старта проекта. Если появляются новые задачи — обсуждаем отдельно и только с вашего согласия.',
                    ],
                ],
            ],
        ];
    }
    return $data;
}, 99, 2 );