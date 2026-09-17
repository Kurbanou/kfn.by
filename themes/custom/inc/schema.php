<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_head', 'wg_schema_local_business', 5 );
function wg_schema_local_business() {
    if ( ! is_front_page() ) return;

    $data = [
        '@context'      => 'https://schema.org',
        '@type'         => 'LocalBusiness',
        'name'          => get_bloginfo( 'name' ),
        'url'           => home_url( '/' ),
        'logo'          => WG_URI . '/assets/img/logo.svg',
        'telephone'     => '+375151234567',
        'address'       => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'ул. Примерная, 1',
            'addressLocality' => 'Гродно',
            'addressCountry'  => 'BY',
        ],
        'openingHours'  => 'Mo-Fr 09:00-18:00',
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
        . '</script>' . "\n";
}