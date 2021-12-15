<?php

$tour_plan = get_post_meta(get_the_ID(), 'mkdf_tour_plan_repeater', true);

if(is_array($tour_plan) && count($tour_plan)) { ?>

    <h3 class="mkdf-tour-plan-title"> <?php echo esc_html__('Tour Plan', 'mkdf-tours'); ?> </h3>

    <?php foreach ($tour_plan as $i => $tour_plan_item) { ?>

        <div class="mkdf-info-section-part mkdf-tour-item-plan-part clearfix">
            <div class="mkdf-route-top-holder">
            	<div class="mkdf-route-id"><?php echo($i + 1); ?></div>
	            <h6 class="mkdf-tour-item-plan-part-title">
	                <?php echo esc_attr($tour_plan_item['plan_section_title']); ?>
	            </h6>
            </div>
            <div class="mkdf-tour-item-plan-part-description">
                <?php
                    echo do_shortcode($tour_plan_item['plan_section_description']);
                ?>
            </div>

        </div>

    <?php }

}