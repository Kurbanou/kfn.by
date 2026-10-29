<?php
/**
 * Template Name: main page
 * Шаблон Главной страницы 
 */

get_header();
?>


<!-- ================= HERO ================= -->
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__content">
            <h1 class="hero__title">Разработка сайтов в Гродно</h1>
            <p class="hero__subtitle">
                Создаём сайты, которые приводят клиентов. Веб-студия полного цикла:
                от прототипа до запуска и продвижения.
            </p>
            <div class="hero__actions">
                <a href="#form" class="btn btn--primary btn--lg">Получить консультацию</a>
                <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="btn btn--outline btn--lg">Смотреть портфолио</a>
            </div>
        </div>

        <div class="hero__media">
            <div class="ide-demo">

                <!-- IDE -->
                <div class="window window--ide">
                    <div class="window__bar">
                        <span class="window__dot window__dot--red"></span>
                        <span class="window__dot window__dot--yellow"></span>
                        <span class="window__dot window__dot--green"></span>
                        <span class="window__title">console.js</span>
                    </div>
                    <div class="ide__code" id="ide-code"></div>
                </div>

                <!-- Превью — Браузер -->
                <div class="window window--browser">
                    <div class="window__bar">
                        <span class="window__dot window__dot--red"></span>
                        <span class="window__dot window__dot--yellow"></span>
                        <span class="window__dot window__dot--green"></span>
                        <div class="browser__address">
                            <span class="browser__url">localhost:8000</span>
                        </div>
                    </div>
                    <div class="browser__viewport">
                        <h4 class="browser__title" id="browser-title"></h4>
                        <button class="browser__restart" id="browser-restart" aria-label="Перезапустить анимацию">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 12a9 9 0 1 1-9-9c2.5 0 4.8 1 6.4 2.6L21 8"/>
                                <path d="M21 3v5h-5"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Контейнер для динамических стилей -->
        <style id="live-styles"></style>
    </div>
</section>

<!-- ================= ПРЕИМУЩЕСТВА ================= -->
<section class="features section">
    <div class="container">
        <h2 class="section__title visually-hidden">Почему выбирают нас</h2>
        <ul class="features__list">
            <li class="features__item feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg width="28" height="28"><use href="#icon-speed"></use></svg>
                </span>
                <h3 class="feature__title">Скорость разработки</h3>
                <p class="feature__text">Лендинг — от 5 дней, магазин — от 3 недель.</p>
            </li>
            <li class="features__item feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg width="28" height="28"><use href="#icon-seo"></use></svg>
                </span>
                <h3 class="feature__title">SEO-оптимизация</h3>
                <p class="feature__text">Готовим сайт к продвижению с первого дня.</p>
            </li>
            <li class="features__item feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg width="28" height="28"><use href="#icon-mobile"></use></svg>
                </span>
                <h3 class="feature__title">Адаптивность</h3>
                <p class="feature__text">Идеально работает на всех устройствах.</p>
            </li>
            <li class="features__item feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg width="28" height="28"><use href="#icon-support"></use></svg>
                </span>
                <h3 class="feature__title">Поддержка</h3>
                <p class="feature__text">Сопровождаем проект после запуска.</p>
            </li>
        </ul>
    </div>
</section>

<!-- ================= УСЛУГИ ================= -->
<section class="services section section--gray">
    <div class="container">
        <h2 class="section__title">Услуги по разработке сайтов</h2>
        <p class="section__subtitle">Полный цикл: от идеи до первых клиентов</p>

        <ul class="services__list">
            <li class="services__item card">
                <h3 class="card__title">Лендинг</h3>
                <p class="card__text">Продающая страница под ключ с высокой конверсией.</p>
                <span class="card__price">от 800 BYN</span>
                <a href="<?php echo esc_url( home_url( '/landing/' ) ); ?>" class="card__link">Подробнее →</a>
            </li>
            <li class="services__item card">
                <h3 class="card__title">Интернет-магазин</h3>
                <p class="card__text">Каталог, корзина, оплата, интеграция с 1С.</p>
                <span class="card__price">от 2500 BYN</span>
                <a href="<?php echo esc_url( home_url( '/ecommerce/' ) ); ?>" class="card__link">Подробнее →</a>
            </li>
            <li class="services__item card">
                <h3 class="card__title">Корпоративный сайт</h3>
                <p class="card__text">Многостраничник для бизнеса с блогом и SEO.</p>
                <span class="card__price">от 1500 BYN</span>
                <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="card__link">Подробнее →</a>
            </li>
            <li class="services__item card">
                <h3 class="card__title">Сайт-визитка</h3>
                <p class="card__text">Быстрый старт для эксперта или малого бизнеса.</p>
                <span class="card__price">от 500 BYN</span>
                <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="card__link">Подробнее →</a>
            </li>
        </ul>
    </div>
</section>

<!-- ================= СТОИМОСТЬ ================= -->
<section class="pricing section" id="pricing">
    <div class="container">
        <h2 class="section__title">Стоимость разработки сайта</h2>
        <p class="section__subtitle">Прозрачные цены, работа по договору</p>

        <ul class="pricing__list">
            <li class="pricing__item plan">
                <h3 class="plan__name">Старт</h3>
                <p class="plan__price">от 800 <span>BYN</span></p>
                <ul class="plan__features">
                    <li>Лендинг</li>
                    <li>5–7 дней</li>
                    <li>Адаптив, форма, SEO-база</li>
                </ul>
                <a href="#form" class="btn btn--outline btn--full">Заказать</a>
            </li>

            <li class="pricing__item plan plan--popular">
                <span class="plan__badge">Популярный</span>
                <h3 class="plan__name">Бизнес</h3>
                <p class="plan__price">от 2000 <span>BYN</span></p>
                <ul class="plan__features">
                    <li>Корпоративный сайт</li>
                    <li>2–3 недели</li>
                    <li>Блог, интеграции, SEO</li>
                </ul>
                <a href="#form" class="btn btn--primary btn--full">Заказать</a>
            </li>

            <li class="pricing__item plan">
                <h3 class="plan__name">Премиум</h3>
                <p class="plan__price">от 5000 <span>BYN</span></p>
                <ul class="plan__features">
                    <li>Интернет-магазин</li>
                    <li>4–6 недель</li>
                    <li>1С, CRM, личный кабинет</li>
                </ul>
                <a href="#form" class="btn btn--outline btn--full">Заказать</a>
            </li>
        </ul>
    </div>
</section>


<!-- ================= ПОРТФОЛИО (из CPT) ================= -->
<?php
$portfolio_query = new WP_Query( [
    'post_type'      => 'portfolio',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order date',
    'order'          => 'DESC',
    'no_found_rows'  => true,
] );

if ( $portfolio_query->have_posts() ) : ?>
    <section class="portfolio section section--gray">
        <div class="container">
            <h2 class="section__title">Наши работы</h2>
            <p class="section__subtitle">Примеры сайтов, которые уже приносят клиентов</p>

            <ul class="portfolio__list">
                <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
                    <?php
                    $client = get_field( 'portfolio_client' );
                    $short  = get_field( 'portfolio_short' );
                    $cover  = get_field( 'portfolio_cover' );
                    $terms  = get_the_terms( get_the_ID(), 'portfolio_type' );
                    ?>
                    <li class="portfolio__item work">
                        <a href="<?php the_permalink(); ?>" class="work__link-wrapper">

                            <?php if ( $cover && is_array( $cover ) ) : ?>
                                <div class="work__image">
                                    <img src="<?php echo esc_url( $cover['sizes']['medium_large'] ?? $cover['url'] ); ?>"
                                         alt="<?php echo esc_attr( $cover['alt'] ?: get_the_title() ); ?>"
                                         loading="lazy"
                                         width="<?php echo esc_attr( $cover['sizes']['medium_large-width'] ?? '' ); ?>"
                                         height="<?php echo esc_attr( $cover['sizes']['medium_large-height'] ?? '' ); ?>">
                                </div>
                            <?php else : ?>
                                <div class="work__image work__image--1" aria-hidden="true"></div>
                            <?php endif; ?>

                            <div class="work__body">
                                <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                                    <span class="work__tag"><?php echo esc_html( $terms[0]->name ); ?></span>
                                <?php endif; ?>

                                <h3 class="work__title"><?php the_title(); ?></h3>

                                <?php if ( $client ) : ?>
                                    <p class="work__client"><?php echo esc_html( $client ); ?></p>
                                <?php endif; ?>

                                <?php if ( $short ) : ?>
                                    <p class="work__text"><?php echo esc_html( $short ); ?></p>
                                <?php endif; ?>

                                <span class="work__link">Подробнее →</span>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="portfolio__cta">
                <a href="<?php echo esc_url( get_permalink( 40 ) ); ?>" class="btn btn--primary">Смотреть всё портфолио</a>
            </div>
        </div>
    </section>
<?php
endif;
wp_reset_postdata();
?>

<!-- ================= ПРОЦЕСС РАБОТЫ ================= -->
<section class="process section">
    <div class="container">
        <h2 class="section__title">Как мы работаем</h2>
        <p class="section__subtitle">6 шагов от идеи до запуска</p>

        <ol class="process__list">
            <li class="process__step">
                <span class="process__num">1</span>
                <h3 class="process__title">Бриф</h3>
                <p class="process__text">Обсуждаем задачи, цели, конкурентов.</p>
            </li>
            <li class="process__step">
                <span class="process__num">2</span>
                <h3 class="process__title">Прототип</h3>
                <p class="process__text">Создаём структуру и логику страниц.</p>
            </li>
            <li class="process__step">
                <span class="process__num">3</span>
                <h3 class="process__title">Дизайн</h3>
                <p class="process__text">Рисуем UX/UI макет в Figma.</p>
            </li>
            <li class="process__step">
                <span class="process__num">4</span>
                <h3 class="process__title">Разработка</h3>
                <p class="process__text">Верстаем, программируем, интегрируем.</p>
            </li>
            <li class="process__step">
                <span class="process__num">5</span>
                <h3 class="process__title">Тест</h3>
                <p class="process__text">Проверяем на всех устройствах и браузерах.</p>
            </li>
            <li class="process__step">
                <span class="process__num">6</span>
                <h3 class="process__title">Запуск</h3>
                <p class="process__text">Переносим на хостинг, настраиваем SEO.</p>
            </li>
        </ol>
    </div>
</section>

<!-- ================= ОТЗЫВЫ ================= -->
<section class="reviews section section--gray">
    <div class="container">
        <h2 class="section__title">Отзывы клиентов</h2>

        <ul class="reviews__list">
            <li class="reviews__item review">
                <div class="review__stars" aria-label="5 из 5">★★★★★</div>
                <p class="review__text">«Заказали лендинг в Гродно — сделали за 6 дней. Конверсия выросла в 2 раза. Рекомендую!»</p>
                <div class="review__author">
                    <span class="review__avatar" aria-hidden="true"></span>
                    <span class="review__name">Андрей Иванов</span>
                    <span class="review__role">директор «СтройДом»</span>
                </div>
            </li>
            <li class="reviews__item review">
                <div class="review__stars" aria-label="5 из 5">★★★★★</div>
                <p class="review__text">«Сделали интернет-магазин с интеграцией 1С. Всё работает быстро, клиенты довольны.»</p>
                <div class="review__author">
                    <span class="review__avatar" aria-hidden="true"></span>
                    <span class="review__name">Мария Петрова</span>
                    <span class="review__role">владелец «ЦветыБел»</span>
                </div>
            </li>
            <li class="reviews__item review">
                <div class="review__stars" aria-label="5 из 5">★★★★★</div>
                <p class="review__text">«Профессиональная веб-студия в Гродно. Помогли с SEO, сайт вышел в топ по нашему городу.»</p>
                <div class="review__author">
                    <span class="review__avatar" aria-hidden="true"></span>
                    <span class="review__name">Сергей Кузнецов</span>
                    <span class="review__role">«АвтоСервис»</span>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- ================= ФОРМА ЗАЯВКИ ================= -->
<section class="cta section" id="form">
    <div class="container cta__inner">
        <div class="cta__content">
            <h2 class="cta__title">Обсудим ваш проект?</h2>
            <p class="cta__text">
                Оставьте заявку — перезвоним в течение 15 минут и бесплатно рассчитаем стоимость.
            </p>
                <ul class="cta__contacts">
                    <li><a href="tel:+375298885419">+375 29 888-54-19</a></li>
                    <li><a href="mailto:kurbanou.faridun@gmail.com">kurbanou.faridun@gmail.com</a></li>
                </ul>
        </div>

        <?php // Форма — см. пункт 8 ниже ?>
        <!-- <?php get_template_part( 'template-parts/form' ); ?> -->
         <?php echo do_shortcode( '[contact-form-7 id="7101a05" title="Форма заявки (главная)"]' ); ?>
    </div>
</section>

<?php get_footer(); ?>