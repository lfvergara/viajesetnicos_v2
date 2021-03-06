<div <?php post_class('mkdf-tours-list-item mkdf-tours-row-item mkdf-item-space'); ?>>
	<div class="mkdf-tours-list-item-table">
		<?php if(has_post_thumbnail()) : ?>
			<div class="mkdf-tours-list-item-image-holder">
				<div class="mkdf-tours-list-item-image-holder-inner">
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);">
						<?php the_post_thumbnail($thumb_size); ?>
					</a>
					<?php if(mkdf_tours_get_tour_label_html()) : ?>
						<span class="mkdf-tours-standard-item-label-holder">
							<?php echo mkdf_tours_get_tour_label_html(); ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="mkdf-tours-list-item-content-holder">
			<div class="mkdf-tours-list-item-title-price-holder">
				<h3 class="mkdf-tour-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
			</div>

            <div class="mkdf-tours-list-item-price-holder">
                <div class="mkdf-tours-list-item-price">
                    <?php echo mkdf_tours_get_tour_price_html(); ?>
                    <span class="mkdf-tours-list-price-label"><?php esc_html_e('/ per person', 'mkdf-tours'); ?></span>
                </div>

                <?php if(mkdf_tours_theme_installed()) : ?>
                    <?php echo wanderers_mkdf_get_social_share_html(); ?>
                <?php endif; ?>
            </div>

			<?php if(mkdf_tours_get_tour_excerpt()) : ?>
				<div class="mkdf-tours-list-item-excerpt">
					<p><?php echo mkdf_tours_get_tour_excerpt($text_length); ?></p>
				</div>
			<?php endif; ?>

            <?php if(!empty(mkdf_core_post_number_of_ratings())) : ?>
                <div class="mkdf-tours-list-item-rating">
                    <?php echo mkdf_core_list_review_details('simple-overall'); ?>
                </div>
            <?php endif; ?>

			<div class="mkdf-tours-list-item-bottom-content">
				<?php if(mkdf_tours_get_tour_duration()) : ?>
					<div class="mkdf-tours-list-item-bottom-item">
						<?php echo mkdf_tours_get_tour_duration_html(); ?>
					</div>
				<?php endif; ?>

				<?php if(mkdf_tours_get_tour_min_age()) : ?>
					<div class="mkdf-tours-list-item-bottom-item">
						<?php echo mkdf_tours_get_tour_min_age_html(); ?>
					</div>
				<?php endif; ?>
				<div class="mkdf-tours-list-item-bottom-item">
					<?php echo mkdf_tours_get_tour_categories_html(); ?>
				</div>
                <div class="mkdf-tours-list-item-bottom-item">
                    <?php echo mkdf_get_tours_destination_html(); ?>
                </div>
			</div>
		</div>
	</div>
</div>