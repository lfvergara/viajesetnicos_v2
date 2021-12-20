<?php if(mkdf_tours_get_tour_min_age()) : ?>
	<div class="mkdf-tours-single-info-item" style="float: left;">
		<?php echo mkdf_tours_get_tour_price_html(get_the_ID()); ?>
		<?php echo mkdf_tours_get_tour_min_age_html(get_the_ID(), true); ?>
	</div>
<?php endif; ?>
