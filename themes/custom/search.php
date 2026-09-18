<?php

/**
 * Шаблон результатов поиска
 */
get_header();
?>

<div class="container section">

    <header class="search-header">
        <h1 class="search-title">
            Результаты поиска:
            <span class="search-query">«<?php echo esc_html(get_search_query()); ?>»</span>
        </h1>

        <?php
        global $wp_query;
        $total = $wp_query->found_posts;
        if ($total) : ?>
            <p class="search-count">
                Найдено: <?php echo esc_html($total); ?>
                <?php echo esc_html(_n('результат', 'результатов', $total, 'custom')); ?>
            </p>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>

        <div class="posts-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'search'); ?>
            <?php endwhile; ?>
        </div>

        <?php
        the_posts_pagination([
            'prev_text' => '← Назад',
            'next_text' => 'Вперёд →',
        ]);
        ?>

    <?php else : ?>

        <div class="search-empty">
            <p>По запросу «<?php echo esc_html(get_search_query()); ?>» ничего не найдено.</p>

            <h2>Попробуйте другой запрос</h2>
            <?php get_search_form(); ?>

            <p class="search-empty__hint">
                Или посмотрите наши
                <a href="<?php echo esc_url(home_url('/services/')); ?>">услуги</a>
                и
                <a href="<?php echo esc_url(home_url('/portfolio/')); ?>">портфолио</a>.
            </p>
        </div>

    <?php endif; ?>

</div>

<?php get_footer(); ?>