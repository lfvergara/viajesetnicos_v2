<?php 

if ( !function_exists('mkdf_membership_dashboard_edit_profile_fields') ) {
	function mkdf_membership_dashboard_edit_profile_fields($params){

		extract($params);

		$edit_profile = wanderers_mkdf_add_dashboard_fields(array(
			'name' => 'edit_profile',
		));

		$edit_profile_form = wanderers_mkdf_add_dashboard_form(array(
			'name' => 'edit_profile_form',
			'form_id'   => 'mkdf-membership-update-profile-form',
			'form_action' => 'mkdf_membership_update_user_profile',
			'parent' => $edit_profile,
			'button_label' => esc_html__('UPDATE PROFILE','mkdf-membership'),
			'button_args' => array(
				'data-updating-text' => esc_html__('UPDATING PROFILE', 'mkdf-membership'),
				'data-updated-text' => esc_html__('PROFILE UPDATED', 'mkdf-membership'),
			)
		));

		$edit_profile_name_group = wanderers_mkdf_add_dashboard_group(array(
			'name' => 'edit_profile_name_group',
			'parent' => $edit_profile_form,
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'first_name',
			'label' => esc_html__('First Name','mkdf-membership'),
			'parent' => $edit_profile_name_group,
			'value' => $first_name
		));
		
		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'last_name',
			'label' => esc_html__('Last Name','mkdf-membership'),
			'parent' => $edit_profile_name_group,
			'value' => $last_name
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'email',
			'label' => esc_html__('Email','mkdf-membership'),
			'parent' => $edit_profile_form,
			'value' => $email,
			'args' => array(
				'input_type' => 'email'
			)
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'url',
			'label' => esc_html__('Website','mkdf-membership'),
			'parent' => $edit_profile_form,
			'value' => $website
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'description',
			'label' => esc_html__('Description','mkdf-membership'),
			'parent' => $edit_profile_form,
			'value' => $description
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password',
			'label' => esc_html__('Password','mkdf-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		wanderers_mkdf_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password2',
			'label' => esc_html__('Repeat Password','mkdf-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		$edit_profile->render();
	}
}
?>

<div class="mkdf-membership-dashboard-page">
	<div>
		<?php mkdf_membership_dashboard_edit_profile_fields($params); ?>
		<?php do_action( 'mkdf_membership_action_login_ajax_response' ); ?>
	</div>
</div>