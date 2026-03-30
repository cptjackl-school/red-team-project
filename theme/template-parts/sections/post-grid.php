<?php

if (!defined('ABSPATH')) {
    exit;
}

$query = isset($args['query']) && $args['query'] instanceof WP_Query ? $args['query'] : null;
$section_title = isset($args['title']) ? (string) $args['title'] : '';
$empty_text = isset($args['empty_text']) ? (string) $args['empty_text'] : __('No posts found.', 'retro-restoration');
$section_link_url = isset($args['section_link_url']) ? (string) $args['section_link_url'] : '';
$section_link_text = isset($args['section_link_text']) ? (string) $args['section_link_text'] : '';
?>
<section class="rr-latest" aria-label="<?php echo esc_attr($section_title !== '' ? $section_title : __('Posts', 'retro-restoration')); ?>">
    <?php if ($section_title !== '') : ?>
        <div class="rr-section-head">
            <h2><?php echo esc_html($section_title); ?></h2>
            <?php if ($section_link_url !== '' && $section_link_text !== '') : ?>
                <a href="<?php echo esc_url($section_link_url); ?>"><?php echo esc_html($section_link_text); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($query instanceof WP_Query && $query->have_posts()) : ?>
        <div class="rr-latest__grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('template-parts/content/post-card'); ?>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p><?php echo esc_html($empty_text); ?></p>
    <?php endif; ?>
</section>
