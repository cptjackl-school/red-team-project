<?php
/**
 * Template Name: Consoles Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$consoles_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'category_name' => 'consoles',
]);
?>
<main class="rr-page-template rr-page-template--consoles">
    <?php
    get_template_part('template-parts/sections/hero', null, [
        'title' => __('Consoles', 'retro-restoration'),
        'subtitle' => __('Stories, guides, and restoration posts focused on game consoles.', 'retro-restoration'),
    ]);

    get_template_part('template-parts/sections/post-grid', null, [
        'title' => __('Console Posts', 'retro-restoration'),
        'query' => $consoles_query,
        'empty_text' => __('No console posts yet. Add posts to the Consoles category.', 'retro-restoration'),
    ]);

    wp_reset_postdata();
    ?>
</main>
<?php get_footer();
