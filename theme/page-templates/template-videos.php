<?php
/**
 * Template Name: Videos Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$videos_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'category_name' => 'videos',
]);
?>
<main class="rr-page-template rr-page-template--videos">
    <?php
    get_template_part('template-parts/sections/hero', null, [
        'title' => __('Videos', 'retro-restoration'),
        'subtitle' => __('Latest video content and behind-the-scenes updates.', 'retro-restoration'),
    ]);

    get_template_part('template-parts/sections/post-grid', null, [
        'title' => __('Video Posts', 'retro-restoration'),
        'query' => $videos_query,
        'empty_text' => __('No video posts yet. Add posts to the Videos category.', 'retro-restoration'),
    ]);

    wp_reset_postdata();
    ?>
</main>
<?php get_footer();
