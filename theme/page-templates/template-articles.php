<?php
/**
 * Template Name: Articles Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$paged = max(1, (int) get_query_var('paged'));

$articles_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    'tag' => 'article',
    'paged' => $paged,
]);
?>
<main class="rr-page-template rr-page-template--articles">
    <?php
    get_template_part('template-parts/sections/hero', null, [
        'title' => __('Articles', 'retro-restoration'),
        'subtitle' => __('Long-form posts designed for focused reading.', 'retro-restoration'),
    ]);
    ?>

    <section class="rr-reading-feed" aria-label="<?php esc_attr_e('Article reading feed', 'retro-restoration'); ?>">
        <?php if ($articles_query->have_posts()) : ?>
            <?php while ($articles_query->have_posts()) : $articles_query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('rr-reading-article'); ?>>
                    <header class="rr-reading-article__header">
                        <p class="rr-reading-article__meta"><?php echo esc_html(get_the_date()); ?></p>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="rr-reading-article__content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <nav class="rr-reading-pagination" aria-label="<?php esc_attr_e('Articles pagination', 'retro-restoration'); ?>">
                <div class="rr-reading-pagination__prev"><?php previous_posts_link(__('Newer articles', 'retro-restoration'), $articles_query->max_num_pages); ?></div>
                <div class="rr-reading-pagination__next"><?php next_posts_link(__('Older articles', 'retro-restoration'), $articles_query->max_num_pages); ?></div>
            </nav>
        <?php else : ?>
            <p class="rr-reading-empty"><?php esc_html_e('No articles found. Add posts with the article tag.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>

    <?php wp_reset_postdata(); ?>
</main>
<?php get_footer();
