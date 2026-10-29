<?php

/**
 * Шаблон страницы 404
 *
 * @package custom
 */

get_header();
?>

<div class="error-404 container section">

    <div class="error-404__content">

        <div class="error-404__code">404</div>

        <h1 class="error-404__title">Страница не найдена</h1>

        <p class="error-404__text">
            Возможно, страница была удалена или вы ошиблись в адресе.
            Но вы можете вернуться на главную или посмотреть наши работы.
        </p>

        <div class="error-404__actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--lg">
                На главную
            </a>
            <a href="<?php echo esc_url(home_url('/portfolio/')); ?>" class="btn btn--outline btn--lg">
                Смотреть портфолио
            </a>
        </div>

        <div class="error-404__links">
            <p>Или перейдите в:</p>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Услуги</a></li>
                <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">Цены</a></li>
                <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Блог</a></li>
                <li><a href="<?php echo esc_url(home_url('/contacts/')); ?>">Контакты</a></li>
            </ul>
        </div>

    </div>

</div>

<?php
get_footer();
