<?php

if (!defined('ABSPATH')) {
	exit;
}

$is_product_archive_fallback = function_exists('is_shop')
	&& (is_shop() || is_post_type_archive('product') || (function_exists('is_product_taxonomy') && is_product_taxonomy()));

if ($is_product_archive_fallback) {
	$archive_product_template = locate_template('archive-product.php');

	if (!empty($archive_product_template)) {
		include $archive_product_template;
		return;
	}
}

get_header();
?>
	<main class="rr-archive-main">
		<?php if (is_archive()) : ?>
			<section class="rr-starter-section rr-starter-section--hero rr-archive-hero">
				<h1><?php echo esc_html(retro_restoration_get_archive_title()); ?></h1>
				<?php $archive_description = get_the_archive_description(); ?>
				<?php if (!empty($archive_description)) : ?>
					<div class="rr-archive-description"><?php echo wp_kses_post($archive_description); ?></div>
				<?php endif; ?>
			</section>
		<?php endif; ?>

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
