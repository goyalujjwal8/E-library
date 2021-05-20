<?php
get_header();
?>
<div class="container">
<div class="coloum">
	<div class="row">
		<div class="colleft">
			<?php
			$author = get_post();
			$count = get_post();

			$format = get_post_format();
			$elements = oceanwp_blog_single_elements_positioning();

			// Loop through elements.
			foreach ($elements as $element) {

				// Featured Image.
				if (
					'featured_image' === $element
					&& !post_password_required()
				) {

					$format = $format ? $format : 'thumbnail';

					get_template_part('partials/single/media/blog-single', $format);
				}
			}
			?>
		</div>
		<div class="colright">
			<div class=" title">
				<?php $heading = get_theme_mod('ocean_single_post_heading_tag', 'h2');
				$heading = $heading ? $heading : 'h2';
				$heading = apply_filters('ocean_single_post_heading', $heading);

				?>
				<?php do_action('ocean_before_single_post_title'); ?>
				<header class="entry-header clr">
					<<?php echo esc_attr($heading); ?> class="single-post-title entry-title" <?php oceanwp_schema_markup('headline'); ?>><?php the_title(); ?></<?php echo esc_attr($heading); ?>><!-- .single-post-title -->
				</header>
			</div>
			<div class='aut'>
				<h3><?php
					echo "Author Name : " . $author->author;
					?>
				</h3>
			</div>

			<div class='cou'>
				<h3>
					<?php
					echo "Book Count : " . $count->count;
					?></h3>
			</div>
			<div class="entry-content clr" <?php oceanwp_schema_markup('entry_content'); ?>>
				<?php
				the_content(); ?>
			</div>

		</div>
	</div>
	<?php
	$elements = oceanwp_blog_single_elements_positioning();
	foreach ($elements as $element) {
		if ('single_comments' === $element) {

			comments_template();
		}
	}
	?>
	</div>
</div>
<?php get_footer(); ?>