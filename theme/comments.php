<?php

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>
<section class="rr-comments" id="comments">
    <?php if (have_comments()) : ?>
        <h2 class="rr-comments__title">
            <?php
            printf(
                esc_html(_n('%1$s Comment', '%1$s Comments', get_comments_number(), 'retro-restoration')),
                esc_html(number_format_i18n(get_comments_number()))
            );
            ?>
        </h2>

        <ol class="rr-comments__list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 56,
                'callback'   => 'retro_restoration_comment_card',
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="rr-comments__closed"><?php esc_html_e('Comments are closed.', 'retro-restoration'); ?></p>
    <?php endif; ?>

    <?php comment_form([
        'title_reply'        => __('Leave a Comment', 'retro-restoration'),
        'title_reply_before' => '<h2 id="reply-title" class="rr-comments__reply-title">',
        'title_reply_after'  => '</h2>',
        'class_form'         => 'rr-comments__form',
    ]); ?>
</section>
