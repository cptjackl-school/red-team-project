<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-shop-archive">
    <section class="rr-starter-section rr-starter-section--hero rr-shop-hero">
        <h1><?php woocommerce_page_title(); ?></h1>
        <p><?php esc_html_e('Browse products, parts, and restoration picks from the workshop.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-latest" aria-label="<?php esc_attr_e('Shop archive', 'retro-restoration'); ?>">
        <?php do_action('woocommerce_archive_description'); ?>

        <?php if (woocommerce_product_loop()) : ?>
            <?php do_action('woocommerce_before_shop_loop'); ?>

            <?php woocommerce_product_loop_start(); ?>
                <?php if (wc_get_loop_prop('total')) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php do_action('woocommerce_shop_loop'); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php woocommerce_product_subcategories(); ?>
            <?php woocommerce_product_loop_end(); ?>

            <?php do_action('woocommerce_after_shop_loop'); ?>
        <?php else : ?>
            <?php do_action('woocommerce_no_products_found'); ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
