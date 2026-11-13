<?php
/**
 * Шаблон архивов (рубрики, метки, даты, автор)
 */
get_header();
?>

<div class="container section">

    <header class="page-header">
        
        <h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>
        <?php
        $description = get_the_archive_description();
        if ( $description ) : ?>
            <p class="page-subtitle"><?php echo wp_kses_post( $description ); ?></p>
        <?php endif; ?>
    </header>

    <?php if ( have_posts() ) : ?>

        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                    <a href="<?php the_permalink(); ?>" class="post-card__link">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-card__thumb">
                                <?php the_post_thumbnail( 'medium_large', [ 'loading' => 'lazy' ] ); ?>
                            </div>
                        <?php else : ?>
                            <div class="post-card__thumb post-card__thumb--placeholder" aria-hidden="true"></div>
                        <?php endif; ?>

                        <div class="post-card__body">
                            <?php
                            $categories = get_the_category();
                            if ( $categories ) : ?>
                                <span class="post-card__category"><?php echo esc_html( $categories[0]->name ); ?></span>
                            <?php endif; ?>

                            <h2 class="post-card__title"><?php the_title(); ?></h2>

                            <p class="post-card__excerpt">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?>
                            </p>

                            <time class="post-card__meta" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <?php
        the_posts_pagination( [
            'mid_size'  => 2,
            'prev_text' => '← Назад',
            'next_text' => 'Вперёд →',
            'class'     => 'pagination',
        ] );
        ?>

    <?php else : ?>
        <p>Записей пока нет.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>