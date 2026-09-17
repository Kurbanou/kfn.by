<?php get_header(); ?>

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
            <div class="hero__mockup" aria-hidden="true">
                <div class="hero__mockup-bar"></div>
                <div class="hero__mockup-body">
                    <span class="hero__mockup-line hero__mockup-line--w60"></span>
                    <span class="hero__mockup-line hero__mockup-line--w80"></span>
                    <span class="hero__mockup-line hero__mockup-line--w40"></span>
                    <span class="hero__mockup-btn"></span>
                </div>
            </div>
        </div>
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

<!-- ================= ПОРТФОЛИО ================= -->
<section class="portfolio section section--gray">
    <div class="container">
        <h2 class="section__title">Наши работы</h2>
        <p class="section__subtitle">Примеры сайтов, которые уже приносят клиентов</p>

        <ul class="portfolio__list">
            <li class="portfolio__item work">
                <div class="work__image work__image--1" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">E-commerce</span>
                    <h3 class="work__title">Интернет-магазин «МебельГродно»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
            <li class="portfolio__item work">
                <div class="work__image work__image--2" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">Landing</span>
                    <h3 class="work__title">Лендинг «СтройДом»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
            <li class="portfolio__item work">
                <div class="work__image work__image--3" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">WordPress</span>
                    <h3 class="work__title">Корпоративный сайт «АвтоСервис»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
            <li class="portfolio__item work">
                <div class="work__image work__image--4" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">Tilda</span>
                    <h3 class="work__title">Лендинг «Фитнес-клуб»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
            <li class="portfolio__item work">
                <div class="work__image work__image--5" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">WooCommerce</span>
                    <h3 class="work__title">Интернет-магазин «ЦветыБел»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
            <li class="portfolio__item work">
                <div class="work__image work__image--6" aria-hidden="true"></div>
                <div class="work__body">
                    <span class="work__tag">WordPress</span>
                    <h3 class="work__title">Сайт-визитка «Юрист Гродно»</h3>
                    <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="work__link">Подробнее →</a>
                </div>
            </li>
        </ul>

        <div class="portfolio__cta">
            <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="btn btn--primary">Смотреть всё портфолио</a>
        </div>
    </div>
</section>

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
                <li><a href="tel:+375151234567">+375 15 123-45-67</a></li>
                <li><a href="mailto:hello@вашдомен.by">hello@вашдомен.by</a></li>
            </ul>
        </div>

        <?php // Форма — см. пункт 8 ниже ?>
        <?php get_template_part( 'template-parts/form' ); ?>
    </div>
</section>

<?php get_footer(); ?>