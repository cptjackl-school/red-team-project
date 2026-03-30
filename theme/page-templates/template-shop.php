<?php
/**
 * Template Name: Shop Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (post_type_exists('product')) {
    $shop_query = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => 12,
        'post_status' => 'publish',
    ]);
    $empty_text = __('No products found yet.', 'retro-restoration');
} else {
    $shop_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'category_name' => 'shop',
    ]);
    $empty_text = __('No shop posts yet. Install WooCommerce or add posts to the Shop category.', 'retro-restoration');
}
?>
<main class="rr-page-template rr-page-template--shop">
    <?php
    get_template_part('template-parts/sections/hero', null, [
        'title' => __('Shop', 'retro-restoration'),
        'subtitle' => __('Products, parts, and picks from the workshop.', 'retro-restoration'),
    ]);

    get_template_part('template-parts/sections/post-grid', null, [
        'title' => __('Shop Items', 'retro-restoration'),
        'query' => $shop_query,
        'empty_text' => $empty_text,
    ]);

    wp_reset_postdata();
    ?>
</main>
<?php get_footer();
