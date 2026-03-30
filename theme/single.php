<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-single">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php if (has_tag('article')) : ?>
                <section class="rr-page-template rr-page-template--articles" aria-label="<?php esc_attr_e('Article post', 'retro-restoration'); ?>">
                    <div class="rr-reading-feed">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('rr-reading-article'); ?>>
                            <header class="rr-reading-article__header">
                                <p class="rr-reading-article__meta"><?php echo esc_html(get_the_date()); ?></p>
                                <h1><?php the_title(); ?></h1>
                            </header>

                            <div class="rr-reading-article__content">
                                <?php the_content(); ?>
                                <?php
                                wp_link_pages([
                                    'before' => '<nav class="rr-reading-pagination" aria-label="' . esc_attr__('Post pages', 'retro-restoration') . '">',
                                    'after'  => '</nav>',
                                ]);
                                ?>
                            </div>
                        </article>
                    </div>
                </section>
            <?php else : ?>
                <section class="rr-single-default" aria-label="<?php esc_attr_e('Post content', 'retro-restoration'); ?>">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('rr-reading-article'); ?>>
                        <header class="rr-reading-article__header">
                            <p class="rr-reading-article__meta"><?php echo esc_html(get_the_date()); ?></p>
                            <h1><?php the_title(); ?></h1>
                        </header>

                        <div class="rr-reading-article__content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="rr-single-default">
            <p><?php esc_html_e('Post not found.', 'retro-restoration'); ?></p>
        </section>
    <?php endif; ?>
</main>
<?php get_footer();
