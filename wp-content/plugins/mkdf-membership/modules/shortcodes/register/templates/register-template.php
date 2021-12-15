<div class="mkdf-social-register-holder">
	<form method="post" class="mkdf-register-form">
        <p class="mkdf-membership-popup-title"><?php echo esc_html(wanderers_mkdf_options()->getOptionValue( 'membership_login_title' )); ?></p>
        <fieldset>
			<div>
                <i class="mkdf-popup-icon ion-person"></i>
				<input type="text" name="user_register_name" id="user_register_name" placeholder="<?php esc_attr_e( 'User Name', 'mkdf-membership' ) ?>" value="" required
				       pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'mkdf-membership' ); ?>"/>
			</div>
			<div>
                <i class="mkdf-popup-icon ion-email"></i>
				<input type="email" name="user_register_email" id="user_register_email" placeholder="<?php esc_attr_e( 'Email', 'mkdf-membership' ) ?>" value="" required />
			</div>
            <div>
                <i class="mkdf-popup-icon ion-unlocked"></i>
                <input type="password" name="user_register_password" id="user_register_password" placeholder="<?php esc_attr_e('Password','mkdf-membership') ?>" value="" required />
            </div>
            <div>
                <i class="mkdf-popup-icon ion-unlocked"></i>
                <input type="password" name="user_register_confirm_password" id="user_register_confirm_password" placeholder="<?php esc_attr_e('Repeat Password','mkdf-membership') ?>" value="" required />
            </div>
            <?php do_action('mkdf_membership_additional_registration_field'); ?>
			<div class="mkdf-register-button-holder">
				<?php
				if ( mkdf_membership_theme_installed() ) {
					echo wanderers_mkdf_get_button_html( array(
						'html_type' => 'button',
						'text'      => esc_html__( 'Register', 'mkdf-membership' ),
						'type'      => 'solid',
						'size'      => 'small'
					) );
				} else {
					echo '<button type="submit">' . esc_html__( 'Register', 'mkdf-membership' ) . '</button>';
				}
				wp_nonce_field( 'mkdf-ajax-register-nonce', 'mkdf-register-security' ); ?>
			</div>
		</fieldset>
	</form>
	<?php do_action( 'mkdf_membership_action_login_ajax_response' ); ?>
</div>