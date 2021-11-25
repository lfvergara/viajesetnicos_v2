<?php

/*** Child Theme Function  ***/
if ( ! function_exists('wanderers_mkdf_child_theme_enqueue_scripts') ) {
	
	function wanderers_mkdf_child_theme_enqueue_scripts() {
		
		$parent_style = 'wanderers-mkdf-default-style';
		
		wp_enqueue_style( 'wanderers-mkdf-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'wanderers_mkdf_child_theme_enqueue_scripts' );
}