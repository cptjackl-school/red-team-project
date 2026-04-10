<?php
/**
 * Template Name: Starter - Shop Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--shop-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Shop Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Starter layout for the WooCommerce shop landing page.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('To Build', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Product filters / categories', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Featured products strip', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Main product grid', 'retro-restoration'); ?></li>
        </ul>

        <?php if (function_exists('woocommerce_content')) : ?>
            <?php woocommerce_content(); ?>
        <?php else : ?>
            <p><?php esc_html_e('WooCommerce is not active. Add temporary shop content or product previews here.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
