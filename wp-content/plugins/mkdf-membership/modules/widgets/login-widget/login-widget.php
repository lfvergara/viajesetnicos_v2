<?php

class MikadofMembershipLoginRegister extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mkdf_login_register_widget',
			esc_html__( 'Mikado Login Widget', 'mkdf-membership' ),
			array( 'description' => esc_html__( 'Login and register membership widget', 'mkdf-membership' ) )
		);
	}
	
	public function widget( $args, $instance ) {
		$additional_class = is_user_logged_in() ? 'mkdf-user-logged-in' : 'mkdf-user-not-logged-in';
		
		echo '<div class="widget mkdf-login-register-widget ' . esc_attr( $additional_class ) . '">';
        if ( ! is_user_logged_in() ) {
            echo mkdf_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-out' );
        } else {
            echo mkdf_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-in' );
        }
		echo '</div>';
	}
}

if ( ! function_exists( 'mkdf_membership_login_widget_load' ) ) {
	function mkdf_membership_login_widget_load() {
		register_widget( 'MikadofMembershipLoginRegister' );
	}
	
	add_action( 'widgets_init', 'mkdf_membership_login_widget_load' );
}

