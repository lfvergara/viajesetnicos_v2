<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			wanderers_mkdf_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="mkdf-bli-content">
			<?php wanderers_mkdf_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<?php wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
		</div>
	</div>
</li>