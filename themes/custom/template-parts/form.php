<form class="cta__form form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
    <?php wp_nonce_field( 'wg_form_action', 'wg_form_nonce' ); ?>
    <input type="hidden" name="action" value="wg_send_form">

    <label class="form__field">
        <span class="form__label">Имя</span>
        <input type="text" name="name" class="form__input" required placeholder="Как к вам обращаться">
    </label>
    <label class="form__field">
        <span class="form__label">Телефон</span>
        <input type="tel" name="phone" class="form__input" required placeholder="+375 __ ___ __ __">
    </label>
    <label class="form__field">
        <span class="form__label">Сообщение</span>
        <textarea name="message" class="form__input form__textarea" rows="3" placeholder="Кратко о проекте"></textarea>
    </label>
    <button type="submit" class="btn btn--primary btn--full btn--lg">Отправить</button>
    <p class="form__note">Нажимая кнопку, вы соглашаетесь с политикой конфиденциальности.</p>
</form>