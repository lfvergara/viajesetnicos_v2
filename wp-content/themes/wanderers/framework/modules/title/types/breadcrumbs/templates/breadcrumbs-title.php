<?php do_action('wanderers_mkdf_before_page_title'); ?>

<div class="mkdf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php wanderers_mkdf_inline_style($holder_styles); ?> <?php echo wanderers_mkdf_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="mkdf-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="mkdf-title-wrapper" <?php wanderers_mkdf_inline_style($wrapper_styles); ?>>
		<div class="mkdf-title-inner">
			<div class="mkdf-grid">
				<?php wanderers_mkdf_custom_breadcrumbs(); ?>
			</div>
	    </div>
	</div>
</div>

<?php do_action('wanderers_mkdf_after_page_title'); ?>
