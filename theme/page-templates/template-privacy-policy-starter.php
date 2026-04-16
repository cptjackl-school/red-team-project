<?php
/**
 * Template Name: Starter - Privacy Policy Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$policy_query = new WP_Query([
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 1,
    'ignore_sticky_posts' => true,
    'tag'                 => 'privacy',
]);

get_header();
?>
<main class="rr-page-template rr-page-template--refund-returns-starter">
    <section class="rr-starter-section rr-starter-section--content rr-refund-returns-content">
        <?php if ($policy_query->have_posts()) : ?>
            <?php while ($policy_query->have_posts()) : $policy_query->the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="rr-policy-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <h1><?php esc_html_e('Privacy Policy', 'retro-restoration'); ?></h1>
            <p><?php esc_html_e('No published post with the "privacy" tag was found.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
