<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('rr-post-card'); ?>>
    <a class="rr-post-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_large'); ?>
        <?php endif; ?>
    </a>
    <div class="rr-post-card__body">
        <p class="rr-post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="rr-post-card__excerpt"><?php the_excerpt(); ?></div>
    </div>
</article>
