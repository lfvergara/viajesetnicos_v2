<?php
/**
 * Plugin Name: Mikado Membership
 * Description: Plugin that adds social login and user dashboard page
 * Author: Mikado Themes
 * Version: 1.0.2
 */

require_once 'load.php';

if ( ! function_exists( 'mkdf_membership_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function mkdf_membership_text_domain() {
		load_plugin_textdomain( 'mkdf-membership', false, MIKADO_MEMBERSHIP_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'mkdf_membership_text_domain' );
}

if ( ! function_exists( 'mkdf_membership_scripts' ) ) {
	/**
	 * Loads plugin scripts
	 */
	function mkdf_membership_scripts() {
		wp_enqueue_style( 'wanderers-mikado-membership-style', plugins_url( MIKADO_MEMBERSHIP_REL_PATH . '/assets/css/membership.min.css' ) );
		if ( function_exists( 'wanderers_mkdf_is_responsive_on' ) && wanderers_mkdf_is_responsive_on() ) {
			wp_enqueue_style( 'wanderers-mikado-membership-responsive-style', plugins_url( MIKADO_MEMBERSHIP_REL_PATH . '/assets/css/membership-responsive.min.css' ) );
		}
		
		//include google+ api
		wp_enqueue_script( 'wanderers-mikado-membership-google-plus-api', 'https://apis.google.com/js/platform.js', array(), null, false );
		
		//underscore for facebook and google login
		//tabs for login widget
		$array_deps = array(
			'underscore',
			'jquery-ui-tabs'
		);
		
		if ( mkdf_membership_theme_installed() ) {
			$array_deps[] = 'wanderers-mkdf-modules';
		}
		
		wp_enqueue_script( 'wanderers-mikado-membership-script', plugins_url( MIKADO_MEMBERSHIP_REL_PATH . '/assets/js/membership.min.js' ), $array_deps, false, true );
	}
	
	add_action( 'wp_enqueue_scripts', 'mkdf_membership_scripts' );
}

if ( ! function_exists( 'mkdf_membership_style_dynamics_deps' ) ) {
	function mkdf_membership_style_dynamics_deps( $deps ) {
		$style_dynamic_deps_array   = array();
		$style_dynamic_deps_array[] = 'wanderers-mikado-membership-style';
		
		if ( function_exists( 'wanderers_mkdf_is_responsive_on' ) && wanderers_mkdf_is_responsive_on() ) {
			$style_dynamic_deps_array[] = 'wanderers-mikado-membership-responsive-style';
		}
		
		return array_merge( $deps, $style_dynamic_deps_array );
	}
	
	add_filter( 'wanderers_mkdf_style_dynamic_deps', 'mkdf_membership_style_dynamics_deps' );
}

if ( ! function_exists( 'mkdf_membership_render_login_form' ) ) {
	function mkdf_membership_render_login_form() {
		
		if ( ! is_user_logged_in() ) {
			//Render modal with login and register forms
			echo mkdf_membership_get_module_template_part( 'widgets', 'login-widget', 'login-modal-template' );
		}
	}
	
	add_action( 'wp_footer', 'mkdf_membership_render_login_form' );
}

