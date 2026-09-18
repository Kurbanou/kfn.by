<?php

/**
 * Шаблон обычной страницы (Услуги, Цены, Портфолио, Контакты)
 */
get_header();
?>


<?php while (have_posts()) : the_post(); ?>
    <article class="page-content container section">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; ?>


<?php get_footer(); ?>