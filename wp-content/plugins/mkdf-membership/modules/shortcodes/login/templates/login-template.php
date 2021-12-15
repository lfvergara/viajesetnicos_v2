<div class="mkdf-social-login-holder">
    <div class="mkdf-social-login-holder-inner">
        <form method="post" class="mkdf-login-form">
            <?php
            $redirect = '';
            if ( isset( $_GET['redirect_uri'] ) ) {
                $redirect = $_GET['redirect_uri'];
            } ?>
            <?php
                $title = wanderers_mkdf_options()->getOptionValue( 'membership_login_title' );
            ?>
            <?php if($title != '') { ?>
                <p class="mkdf-membership-popup-title"><?php echo esc_html($title); ?></p>
            <?php } ?>
            <fieldset>
                <div>
                    <i class="mkdf-popup-icon ion-person"></i>
                    <input type="text" name="user_login_name" id="user_login_name" placeholder="<?php esc_attr_e( 'User Name', 'mkdf-membership' ) ?>" value="" required pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'mkdf-membership' ); ?>"/>
                </div>
                <div class="mkdf-login-pw">
                    <i class="mkdf-popup-icon ion-unlocked"></i>
                    <input type="password" name="user_login_password" id="user_login_password" placeholder="<?php esc_attr_e( 'Password', 'mkdf-membership' ) ?>" value="" required/>
                </div>
                <div class="mkdf-lost-pass-remember-holder clearfix">
                    <span class="mkdf-login-remember">
                        <input name="rememberme" value="forever" id="rememberme" type="checkbox"/>
                        <label for="rememberme" class="mkdf-checbox-label"><?php esc_html_e( 'Remember me', 'mkdf-membership' ) ?></label>
                    </span>
                </div>
                <a href="<?php echo wp_lostpassword_url(); ?>" class="mkdf-login-action-btn" data-el="#mkdf-reset-pass-content" data-title="<?php esc_attr_e( 'Lost Password?', 'mkdf-membership' ); ?>"><?php esc_html_e( 'Lost Your password?', 'mkdf-membership' ); ?></a>
                <input type="hidden" name="redirect" id="redirect" value="<?php echo esc_url( $redirect ); ?>">
                <div class="mkdf-login-button-holder">
                    <?php
                    if ( mkdf_membership_theme_installed() ) {
                        echo wanderers_mkdf_get_button_html( array(
                            'html_type' => 'button',
                            'text'      => esc_html__( 'Login', 'mkdf-membership' ),
                            'type'      => 'solid',
                            'size'      => 'small'
                        ) );
                    } else {
                        echo '<button type="submit">' . esc_html__( 'Login', 'mkdf-membership' ) . '</button>';
                    }
                    ?>
                    <?php wp_nonce_field( 'mkdf-ajax-login-nonce', 'mkdf-login-security' ); ?>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if(mkdf_membership_theme_installed()) {
        //if social login enabled add social networks login
        $social_login_enabled = wanderers_mkdf_options()->getOptionValue('enable_social_login') == 'yes' ? true : false;
        if($social_login_enabled) { ?>
            <div class="mkdf-login-form-social-login">
                <div class="mkdf-login-social-title">
                    <?php esc_html_e('Connect with Social Networks', 'mkdf-membership'); ?>
                </div>
                <div class="mkdf-login-social-networks">
                    <?php do_action('mkdf_membership_social_network_login'); ?>
                </div>
            </div>
        <?php }
    }
    do_action( 'mkdf_membership_action_login_ajax_response' );
    ?>
</div>