<?php

add_action( 'admin_post_nopriv_wg_send_form', 'wg_handle_form' );
add_action( 'admin_post_wg_send_form', 'wg_handle_form' );

function wg_handle_form() {
    if ( ! isset( $_POST['wg_form_nonce'] ) || ! wp_verify_nonce( $_POST['wg_form_nonce'], 'wg_form_action' ) ) {
        wp_die( 'Ошибка проверки.', 'Ошибка', [ 'response' => 403 ] );
    }

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! $phone ) {
        wp_safe_redirect( add_query_arg( 'sent', 'error', wp_get_referer() ) );
        exit;
    }

    // Отправка письма админу
    $to      = get_option( 'admin_email' );
    $subject = 'Новая заявка с сайта';
    $body    = "Имя: $name\nТелефон: $phone\nСообщение:\n$message";
    wp_mail( $to, $subject, $body );

    wp_safe_redirect( add_query_arg( 'sent', 'ok', wp_get_referer() ) . '#form' );
    exit;
}