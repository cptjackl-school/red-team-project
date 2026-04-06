<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>
<main class="rr-archive-main">
	<section class="rr-archive-cards" aria-label="<?php esc_attr_e('Post archive', 'retro-restoration'); ?>">
		<?php if (have_posts()) : ?>
			<div class="rr-archive-grid">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content/post-card'); ?>
				<?php endwhile; ?>
			</div>

			<nav class="rr-archive-pagination" aria-label="<?php esc_attr_e('Archive pagination', 'retro-restoration'); ?>">
				<div><?php previous_posts_link(__('Newer posts', 'retro-restoration')); ?></div>
				<div><?php next_posts_link(__('Older posts', 'retro-restoration')); ?></div>
			</nav>
		<?php else : ?>
			<p><?php esc_html_e('No posts found.', 'retro-restoration'); ?></p>
		<?php endif; ?>
	</section>
</main>
<?php get_footer();
