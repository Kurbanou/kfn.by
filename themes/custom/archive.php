<?php

/**
 * Шаблон архивов (рубрики, метки, даты, автор)
 */
get_header();
?>

<div class="container section">

    <header class="archive-header">
        <?php
        the_archive_title('<h1 class="archive-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header>

    <?php if (have_posts()) : ?>

        <div class="posts-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_type()); ?>
            <?php endwhile; ?>
        </div>

        <?php
        the_posts_pagination([
            'prev_text' => '← Назад',
            'next_text' => 'Вперёд →',
        ]);
        ?>

    <?php else : ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>

</div>

<?php get_footer(); ?>