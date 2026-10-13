<?php
/**
 * Шаблон страницы «Портфолио» (Page ID 40)
 * URL: /portfolio/
 *
 * Выводит архив CPT `portfolio` с фильтрами по таксономии `portfolio_type`.
 *
 * @package custom
 */

get_header();
?>

<article class="page-content container section">

    <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php
        // Вступление из контента Page (если заполнен в Gutenberg)
        while ( have_posts() ) :
            the_post();
            $intro = get_the_content();
            if ( $intro ) : ?>
                <div class="page-intro"><?php the_content(); ?></div>
            <?php endif;
        endwhile;
        ?>
    </header>

    <?php
    // ─── Фильтры по типам работ ─────────────────────────────
    $current_type = isset( $_GET['type'] ) ? sanitize_key( wp_unslash( $_GET['type'] ) ) : '';
    $types = get_terms( [
        'taxonomy'   => 'portfolio_type',
        'hide_empty' => true,
    ] );

    if ( ! is_wp_error( $types ) && ! empty( $types ) ) : ?>
        <nav class="portfolio-filters" aria-label="Фильтр по типу работ">
            <a href="<?php echo esc_url( get_permalink() ); ?>"
               class="portfolio-filters__item <?php echo $current_type === '' ? 'is-active' : ''; ?>">
                Все работы
            </a>
            <?php foreach ( $types as $type ) : ?>
                <a href="<?php echo esc_url( add_query_arg( 'type', $type->slug, get_permalink() ) ); ?>"
                   class="portfolio-filters__item <?php echo $current_type === $type->slug ? 'is-active' : ''; ?>">
                    <?php echo esc_html( $type->name ); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <?php
    // ─── Запрос кейсов ──────────────────────────────────────
    $paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );

    $args = [
        'post_type'      => 'portfolio',
        'posts_per_page' => 9,
        'paged'          => $paged,
        'orderby'        => 'menu_order date',
        'order'          => 'DESC',
    ];

    if ( $current_type ) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'portfolio_type',
                'field'    => 'slug',
                'terms'    => $current_type,
            ],
        ];
    }

    $portfolio_query = new WP_Query( $args );
    ?>

    <?php if ( $portfolio_query->have_posts() ) : ?>

        <ul class="portfolio__list">
            <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
                <?php
                $client = get_field( 'portfolio_client' );
                $short  = get_field( 'portfolio_short' );
                $terms  = get_the_terms( get_the_ID(), 'portfolio_type' );
                ?>
                <li class="portfolio__item work">
                    <a href="<?php the_permalink(); ?>" class="work__link-wrapper">

                        <?php
                        $cover = get_field( 'portfolio_cover' );
                        if ( $cover && is_array( $cover ) ) : ?>
                            <div class="work__image">
                                <img src="<?php echo esc_url( $cover['sizes']['medium_large'] ?? $cover['url'] ); ?>"
                                     alt="<?php echo esc_attr( $cover['alt'] ?: get_the_title() ); ?>"
                                     loading="lazy"
                                     width="<?php echo esc_attr( $cover['sizes']['medium_large-width'] ?? '' ); ?>"
                                     height="<?php echo esc_attr( $cover['sizes']['medium_large-height'] ?? '' ); ?>">
                            </div>
                        <?php else : ?>
                            <div class="work__image work__image--1" aria-hidden="true"></div>
                        <?php endif; ?>

                        <div class="work__body">
                            <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                                <span class="work__tag"><?php echo esc_html( $terms[0]->name ); ?></span>
                            <?php endif; ?>

                            <h2 class="work__title"><?php the_title(); ?></h2>

                            <?php if ( $client ) : ?>
                                <p class="work__client"><?php echo esc_html( $client ); ?></p>
                            <?php endif; ?>

                            <?php if ( $short ) : ?>
                                <p class="work__text"><?php echo esc_html( $short ); ?></p>
                            <?php endif; ?>

                            <span class="work__link">Подробнее →</span>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <?php
        // ─── Пагинация ──────────────────────────────────────
        $big = 999999999;
        $pagination = paginate_links( [
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $portfolio_query->max_num_pages,
            'prev_text' => '← Назад',
            'next_text' => 'Вперёд →',
            'type'      => 'list',
        ] );

        if ( $pagination ) :
            echo '<nav class="pagination" aria-label="Пагинация">' . $pagination . '</nav>';
        endif;
        ?>

    <?php else : ?>

        <div class="portfolio-empty">
            <p>Портфолио пока в разработке.</p>
            <p>Хотите стать первым кейсом? <a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>">Свяжитесь с нами</a> — первым клиентам скидка 30%.</p>
        </div>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

</article>

<?php
get_footer();