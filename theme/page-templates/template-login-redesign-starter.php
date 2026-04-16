<?php
/**
 * Template Name: Starter - Account Redesign
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--login-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Account', 'retro-restoration'); ?></h1>
        <p><?php is_user_logged_in() ? sprintf(esc_html__('Hello %s (not you? Log out below)', 'retro-restoration'), wp_get_current_user()->user_email) : esc_html_e('Login or create a new account to get started.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content rr-account-section">
        <?php if (shortcode_exists('woocommerce_my_account')) : ?>
            <div class="rr-account-wrapper">
                <?php echo do_shortcode('[woocommerce_my_account]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php else : ?>
            <div class="rr-account-unavailable">
                <h2><?php esc_html_e('Account Page Unavailable', 'retro-restoration'); ?></h2>
                <p><?php esc_html_e('WooCommerce is required to display your account page. Please install and activate WooCommerce to use account features.', 'retro-restoration'); ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
