<?php
/**
 * Template Name: Featured Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$featured_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'ignore_sticky_posts' => 0,
]);
?>
<main class="rr-page-template rr-page-template--featured">
    <?php
    get_template_part('template-parts/sections/hero', null, [
        'title' => __('Featured', 'retro-restoration'),
        'subtitle' => __('Highlights and editor picks from the blog.', 'retro-restoration'),
    ]);

    get_template_part('template-parts/sections/post-grid', null, [
        'title' => __('Featured Posts', 'retro-restoration'),
        'query' => $featured_query,
        'empty_text' => __('No featured posts yet.', 'retro-restoration'),
    ]);

    wp_reset_postdata();
    ?>
</main>
<?php get_footer();
