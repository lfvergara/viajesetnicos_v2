<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * wanderers_mkdf_header_meta hook
	 *
	 * @see wanderers_mkdf_header_meta() - hooked with 10
	 * @see wanderers_mkdf_user_scalable_meta() - hooked with 10
	 * @see mkdf_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'wanderers_mkdf_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * wanderers_mkdf_after_body_tag hook
	 *
	 * @see wanderers_mkdf_get_side_area() - hooked with 10
	 * @see wanderers_mkdf_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'wanderers_mkdf_after_body_tag' ); ?>

	<div class="mkdf-wrapper">
		<div class="mkdf-wrapper-inner">
			<div class="mkdf-content">
				<div class="mkdf-content-inner">
					<?php get_template_part( 'slider' ); ?>
					<div class="mkdf-full-width">
						<div class="mkdf-full-width-inner">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>