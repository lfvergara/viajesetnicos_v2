<?php if ($booking) : ?>

    <div class="mkdf-tours-checkout-content">
        <div class="mkdf-container">
            <div class="mkdf-container-inner clearfix">
                <?php if ($is_payment && $is_payment_sucessfull) : ?>
                    <div class="mkdf-tours-success-payment-content">
                        <p><?php esc_html_e('You have succcessfully completed payment process. Enjoy your tour!', 'mkdf-tours'); ?></p>

                        <div class="mkdf-tours-success-payment-button-holder">
                            <?php if (mkdf_tours_theme_installed()) : ?>
                                <?php echo wanderers_mkdf_get_button_html(array(
                                    'link' => home_url('/'),
                                    'text' => esc_html__('Return to home', 'mkdf-tours')
                                )); ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Pay with paypal', 'mkdf-tours') ?></a>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php else : ?>
                    <div class="mkdf-tours-checkout-content-inner">
                    <div class="mkdf-tours-image-holder">
                        <?php echo get_the_post_thumbnail($booking->ID, 'wanderers_mkdf_landscape'); ?>
                        <div class="mkdf-tours-image-bckg" <?php wanderers_mkdf_inline_style($style); ?>></div>
                    </div>
                    <div class="mkdf-tours-info-holder">
                    <h2 class="mkdf-tours-info-title"><?php echo get_the_title($booking->ID); ?></h2>

                    <h6 class="mkdf-tours-info-message">
                        <?php esc_html_e('You have successfully booked ', 'mkdf-tours');
                        print $booking->amount;
                        esc_html_e(' ticket(s) for ', 'mkdf-tours');
                        echo get_the_title($booking->ID); ?>
                    </h6>
                    <div class="mkdf-tours-info-description">
                        <h5 class="mkdf-tours-info-checkout-title"><?php esc_html_e('Tour Description:', 'mkdf-tours'); ?></h5>
                        <span><?php echo get_the_excerpt($booking->ID); ?></span>
                    </div>
                    <div>
                        <h5 class="mkdf-tours-info-checkout-title"><?php esc_html_e('Departure Date:', 'mkdf-tours'); ?></h5>
                        <span><?php echo esc_html(date(get_option('date_format'), strtotime($booking->booking_date))); ?></span>
                    </div>
                    <div>
                        <h5 class="mkdf-tours-info-checkout-title"><?php esc_html_e('Total Price:', 'mkdf-tours'); ?></h5>
                        <span class="mkdf-tours-booking-price"><?php echo esc_html($booking->price); ?></span>
                    </div>
                    <?php if (mkdf_tours_paypal_enabled()) : ?>

                        <?php

                        $facilitator = mkdf_tours_get_paypal_facilitator_id();
                        $currency = mkdf_tours_get_paypal_currency();
                        //Data for later use after completing payment
                        $form_custom_data = array(
                            'booking_hash' => $booking->unique_hash,
                            'tour_id'      => $booking->ID
                        );

                        $form_data_string = json_encode($form_custom_data);
                        ?>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="first_name" value="<?php echo esc_attr($booking->user_name); ?>">
                            <input type="hidden" name="email" value="<?php echo esc_attr($booking->user_email); ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="item_name"
                                   value="<?php echo esc_attr(get_the_title($booking->ID)); ?>">
                            <input type="hidden" name="amount" value="<?php echo esc_attr($booking->raw_price); ?>">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="charset" value="<?php bloginfo('charset'); ?>">
                            <?php if ($facilitator) { ?>
                                <input type="hidden" name="business" value="<?php echo esc_attr($facilitator); ?>">
                            <?php } ?>
                            <input type="hidden" name="currency_code" value="<?php echo esc_html($currency); ?>">
                            <input type="hidden" name="custom" value="<?php echo esc_attr($form_data_string); ?>">
                            <input type="hidden" name="notify_url"
                                   value="<?php echo plugins_url() . '/mkdf-tours/payment/paypal/ipn_listener.php'; ?>"/>
                            <input type="hidden" name="return"
                                   value="<?php echo esc_url(add_query_arg(array('returned_from_payment' => 'true'), $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"])); ?>">

                            <?php if (mkdf_tours_theme_installed()) : ?>
                                <?php echo wanderers_mkdf_get_button_html(array(
                                    'html_type' => 'button',
                                    'text'      => esc_html__('Pay with paypal', 'mkdf-tours')
                                )); ?>
                            <?php else: ?>
                                <button><?php esc_html_e('Pay with paypal', 'mkdf-tours') ?></button>
                            <?php endif; ?>
                        </form>
                        </div>
                        </div>

                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>