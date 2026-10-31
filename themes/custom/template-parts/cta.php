<?php

/**
 * Блок CTA (форма заявки) — используется на всех страницах
 *
 * @package custom
 */
?>

<section class="cta section" id="form">
    <div class="container cta__inner">
        <div class="cta__content">
            <h2 class="section__title cta__title">Обсудим ваш <span>проект?</span> </h2>
            <p class="cta__text">
                Оставьте заявку — перезвоним в течение 15 минут и бесплатно рассчитаем стоимость.
            </p>

            <!-- Список преимуществ -->
            <ul class="cta__benefits">
                <li>Бесплатный бриф и расчёт стоимости</li>
                <li>Ответ в течение 15 минут</li>
                <li>Фиксированная цена в договоре</li>
                <li>Гарантия 12 месяцев</li>
            </ul>

            <ul class="cta__contacts">
                <li><a href="tel:+375298885419">+375 29 888-54-19</a></li>
                <li><a href="mailto:kurbanou.faridun@gmail.com">kurbanou.faridun@gmail.com</a></li>
            </ul>
        </div>

        <?php echo do_shortcode('[contact-form-7 id="7101a05" title="Форма заявки (главная)"]'); ?>
    </div>
</section>