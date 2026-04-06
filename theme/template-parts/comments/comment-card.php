<?php

if (!defined('ABSPATH')) {
    exit;
}

$comment        = $args['comment'] ?? null;
$comment_depth  = isset($args['depth']) ? (int) $args['depth'] : 1;
$comment_number = isset($args['comment_number']) ? (int) $args['comment_number'] : 0;

if (!$comment instanceof WP_Comment) {
    return;
}

$comment_classes = 'rr-comment-card';
if (!empty($comment->comment_parent)) {
    $comment_classes .= ' rr-comment-card--child';
}
?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class($comment_classes); ?>>
    <article class="rr-comment-card__inner">
        <header class="rr-comment-card__header">
            <div class="rr-comment-card__avatar">
                <?php echo get_avatar($comment, 56); ?>
            </div>
            <div class="rr-comment-card__meta">
                <p class="rr-comment-card__author"><?php echo esc_html(get_comment_author($comment)); ?></p>
                <time class="rr-comment-card__date" datetime="<?php echo esc_attr(get_comment_time('c')); ?>">
                    <?php echo esc_html(get_comment_date('', $comment)); ?>
                </time>
            </div>
        </header>

        <div class="rr-comment-card__content">
            <?php if (1 === (int) $comment->comment_approved) : ?>
                <?php comment_text($comment); ?>
            <?php else : ?>
                <p class="rr-comment-card__moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'retro-restoration'); ?></p>
            <?php endif; ?>
        </div>

        <footer class="rr-comment-card__footer">
            <?php
            comment_reply_link([
                'depth'     => $comment_depth,
                'max_depth' => get_option('thread_comments_depth'),
                'reply_text'=> __('Reply', 'retro-restoration'),
            ]);
            ?>
            <?php edit_comment_link(__('Edit', 'retro-restoration'), '<span class="rr-comment-card__edit">', '</span>', $comment); ?>
        </footer>
    </article>
</li>
