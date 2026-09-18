<?php

/**
 * Шаблон отдельной записи блога
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-full container section'); ?>>

        <header class="post-header">
            <h1 class="post-title"><?php the_title(); ?></h1>

            <div class="post-meta">
                <time class="post-date" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                    <?php echo esc_html(get_the_date()); ?>
                </time>

                <?php
                $categories = get_the_category();
                if ($categories) : ?>
                    <span class="post-categories">
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>

                <span class="post-author">
                    <?php echo esc_html(get_the_author()); ?>
                </span>
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('large', ['loading' => 'eager']); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <?php
        // Навигация: предыдущая / следующая запись
        the_post_navigation([
            'prev_text' => '← %title',
            'next_text' => '%title →',
        ]);
        ?>

        <?php
        // Похожие статьи (3 шт из той же категории)
        $related = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => [get_the_ID()],
            'category__in'   => wp_get_post_categories(get_the_ID()),
        ]);

        if ($related->have_posts()) : ?>
            <section class="related-posts">
                <h2 class="related-posts__title">Похожие статьи</h2>
                <div class="posts-grid">
                    <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <article class="post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-card__thumb">
                                    <?php the_post_thumbnail('medium', ['loading' => 'lazy']); ?>
                                </a>
                            <?php endif; ?>
                            <h3 class="post-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <?php
        // Комментарии (если открыты)
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>

    </article>
<?php endwhile; ?>

<?php get_footer(); ?>