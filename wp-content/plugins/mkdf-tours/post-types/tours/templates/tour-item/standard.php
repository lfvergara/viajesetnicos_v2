<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

if (!isset($thumb_size) || $thumb_size == ''){
	$thumb_size = 'full';
}
?>
<div <?php post_class('mkdf-tours-standard-item mkdf-tours-row-item mkdf-item-space'); ?>>
	<?php if(has_post_thumbnail()) : ?>
		<div class="mkdf-tours-standard-item-image-holder">
			<a href="<?php the_permalink(); ?>">
				<?php echo mkdf_tours_get_tour_image_html($thumb_size); ?>
			</a>
			<?php if(mkdf_tours_get_tour_label_html()) : ?>
				<span class="mkdf-tours-standard-item-label-holder">
					<?php echo mkdf_tours_get_tour_label_html(); ?>
				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="mkdf-tours-standard-item-content-holder">
		<div class="mkdf-tours-standard-item-content-inner">
			<div class="mkdf-tours-standard-item-title-price-holder">
				<<?php echo esc_attr($title_tag);?> class="mkdf-tour-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</<?php echo esc_attr($title_tag);?>>
				<span class="mkdf-tours-standard-item-price-holder">
					<?php echo mkdf_tours_get_tour_price_html(); ?>
                    <span class="mkdf-tours-item-price-additional-text">
                        <?php echo esc_html__('/ per person', 'mkdf-tours'); ?>
                    </span>
				</span>
			</div>
	
			<?php if(mkdf_tours_get_tour_excerpt()) : ?>
				<div class="mkdf-tours-standard-item-excerpt">
					<?php echo mkdf_tours_get_tour_excerpt($text_length); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="mkdf-tours-standard-item-bottom-content">
			<?php if(mkdf_tours_get_tour_duration()) : ?>
				<div class="mkdf-tours-standard-item-bottom-item">
					<?php echo mkdf_tours_get_tour_duration_html(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>