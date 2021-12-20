<?php
$title = get_the_title();
?>

<div class="mkdf-info-section-part mkdf-tour-item-title-holder clearfix">
	<?php if($title !== '') : ?>
		<h3 class="mkdf-tour-item-title">
			<?php echo esc_html($title) ?>
		</h3>
	<?php endif; ?>

	<div class="mkdf-tour-item-price-holder">
		<span class="mkdf-tour-item-price">
			<?php echo mkdf_tours_get_tour_price_html(get_the_ID()); ?>
		</span>

		<span class="mkdf-tour-item-price-text">
			<?php  //esc_html_e('per person', 'mkdf-tours'); ?>
		</span>
	</div>
</div>
