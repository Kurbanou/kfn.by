<?php
/**
 * Шорткоды темы
 *
 * @package custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Шорткод: вывод кейсов портфолио по типу
 * Использование: [wg_portfolio_cases type="e-commerce" count="3"]
 */
add_shortcode( 'wg_portfolio_cases', function( $atts ) {
    $atts = shortcode_atts( [
        'type'  => '',
        'count' => 3,
    ], $atts, 'wg_portfolio_cases' );

    $args = [
        'post_type'      => 'portfolio',
        'posts_per_page' => (int) $atts['count'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if ( $atts['type'] ) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'portfolio_type',
                'field'    => 'slug',
                'terms'    => sanitize_key( $atts['type'] ),
            ],
        ];
    }

    $query = new WP_Query( $args );

    if ( ! $query->have_posts() ) {
        return '';
    }

    ob_start();
    ?>
    <ul class="portfolio__list">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php
            $cover  = get_field( 'portfolio_cover' );
            $short  = get_field( 'portfolio_short' );
            $client = get_field( 'portfolio_client' );
            $terms  = get_the_terms( get_the_ID(), 'portfolio_type' );
            ?>
            <li class="portfolio__item work">
                <a href="<?php the_permalink(); ?>" class="work__link-wrapper">
                    <?php if ( $cover && is_array( $cover ) ) : ?>
                        <div class="work__image">
                            <img src="<?php echo esc_url( $cover['sizes']['medium_large'] ?? $cover['url'] ); ?>"
                                 alt="<?php echo esc_attr( $cover['alt'] ?: get_the_title() ); ?>"
                                 loading="lazy">
                        </div>
                    <?php else : ?>
                        <div class="work__image work__image--1" aria-hidden="true"></div>
                    <?php endif; ?>

                    <div class="work__body">
                        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                            <span class="work__tag"><?php echo esc_html( $terms[0]->name ); ?></span>
                        <?php endif; ?>
                        <h3 class="work__title"><?php the_title(); ?></h3>
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
    wp_reset_postdata();
    return ob_get_clean();
} );