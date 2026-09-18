<?php

/**
 * Шаблон 404 — страница не найдена
 */
get_header();
?>

<div class="container section error-404">

    <header class="error-404__header">
        <span class="error-404__code" aria-hidden="true">404</span>
        <h1 class="error-404__title">Страница не найдена</h1>
    </header>

    <div class="error-404__content">
        <p class="error-404__text">
            К сожалению, такой страницы нет. Возможно, она была удалена или вы ошиблись в адресе.
        </p>

        <div class="error-404__actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                ← На главную
            </a>
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn--outline">
                Услуги
            </a>
        </div>

        <div class="error-404__search">
            <h2 class="error-404__search-title">Или воспользуйтесь поиском</h2>
            <?php get_search_form(); ?>
        </div>

        <?php
        // Популярные страницы
        $popular = new WP_Query([
            'post_type'      => 'page',
            'posts_per_page' => 5,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        if ($popular->have_posts()) : ?>
            <div class="error-404__links">
                <h2>Популярные страницы</h2>
                <ul>
                    <?php while ($popular->have_posts()) : $popular->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>