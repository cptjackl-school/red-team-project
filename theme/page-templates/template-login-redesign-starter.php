<?php
/**
 * Template Name: Starter - Login Redesign
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--login-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Login Redesign Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Use this page as the starting point for the new login experience.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('Planned Sections', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Brand / welcome area', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Login form module', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Links: reset password, register, support', 'retro-restoration'); ?></li>
        </ul>

        <?php if (shortcode_exists('woocommerce_my_account')) : ?>
            <?php echo do_shortcode('[woocommerce_my_account]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php else : ?>
            <p><?php esc_html_e('WooCommerce account shortcode is unavailable. Add your custom login form here.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
