<?php

if ( ! function_exists( 'wanderers_mkdf_include_search_types_before_load' ) ) {
    /**
     * Load's all header types before load files by going through all folders that are placed directly in header types folder.
     * Functions from this files before-load are used to set all hooks and variables before global options map are init
     */
    function wanderers_mkdf_include_search_types_before_load() {
        foreach ( glob( MIKADO_FRAMEWORK_SEARCH_ROOT_DIR . '/types/*/before-load.php' ) as $module_load ) {
            include_once $module_load;
        }
    }

    add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_include_search_types_before_load', 1 ); // 1 is set to just be before header option map init
}

if ( ! function_exists( 'wanderers_mkdf_load_search' ) ) {
	function wanderers_mkdf_load_search() {
		
		if ( wanderers_mkdf_active_widget( false, false, 'mkdf_search_opener' ) ) {
			include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/covers-header/covers-header.php';
		}
	}
	
	add_action( 'init', 'wanderers_mkdf_load_search' );
}

if ( ! function_exists( 'wanderers_mkdf_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function wanderers_mkdf_get_holder_params_search() {
		$params_list = array();
		
		$layout = wanderers_mkdf_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'mkdf-container';
			$params_list['inner']  = 'mkdf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'mkdf-full-width';
			$params_list['inner']  = 'mkdf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'wanderers_mkdf_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_search_page' ) ) {
	function wanderers_mkdf_get_search_page() {
		$sidebar_layout = wanderers_mkdf_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		wanderers_mkdf_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function wanderers_mkdf_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'wanderers_mkdf_search_page_path', 'templates/page' );
		$type   = apply_filters( 'wanderers_mkdf_search_page_layout', 'default' );
		$module = apply_filters( 'wanderers_mkdf_search_page_module', 'search' );
		$plugin = apply_filters( 'wanderers_mkdf_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => wanderers_mkdf_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'wanderers_mkdf_search_page_params', $params );
		
		wanderers_mkdf_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}