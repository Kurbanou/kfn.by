<?php
/**
 * Шаблон: Услуги
 * Использование: get_template_part('template-parts/services');
 */
?>
<!-- ================= УСЛУГИ ================= -->
<section class="services section section--gray">
    <div class="container">
        <div class="section-label">● Наши услуги</div>
        <h2 class="section__title">Услуги по <span>разработке сайтов</span></h2>
        <p class="section__subtitle">Полный цикл: от идеи до первых клиентов</p>

        <ul class="services__list">
            <li class="services__item card">
                <div class="card__image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/service-landing.webp'); ?>" alt="Лендинг" loading="lazy">
                </div>
                <h3 class="card__title">Лендинг</h3>
                <p class="card__text">Продающая страница под ключ с высокой конверсией.</p>
                <span class="card__price">от 800 BYN</span>
                <a href="<?php echo esc_url(home_url('/landing/')); ?>" class="card__link">Подробнее →</a>
            </li>
            
            <li class="services__item card">
                <div class="card__image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/service-ecommerce.webp'); ?>" alt="Интернет-магазин" loading="lazy">
                </div>
                <h3 class="card__title">Интернет-магазин</h3>
                <p class="card__text">Каталог, корзина, оплата, интеграция с 1С.</p>
                <span class="card__price">от 2500 BYN</span>
                <a href="<?php echo esc_url(home_url('/ecommerce/')); ?>" class="card__link">Подробнее →</a>
            </li>

            <li class="services__item card">
                <div class="card__image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/service-corporate.webp'); ?>" alt="Корпоративный сайт" loading="lazy">
                </div>
                <h3 class="card__title">Корпоративный сайт</h3>
                <p class="card__text">Многостраничник для бизнеса с блогом и SEO.</p>
                <span class="card__price">от 1500 BYN</span>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="card__link">Подробнее →</a>
            </li>

            <li class="services__item card">
                <div class="card__image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/service-visitka.webp'); ?>" alt="Сайт-визитка" loading="lazy">
                </div>
                <h3 class="card__title">Сайт-визитка</h3>
                <p class="card__text">Быстрый старт для эксперта или малого бизнеса.</p>
                <span class="card__price">от 500 BYN</span>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="card__link">Подробнее →</a>
            </li>
        </ul>
    </div>
</section>