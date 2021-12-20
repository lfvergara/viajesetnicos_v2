<?php
extract($tour_sections);
?>
<div class="mkdf-tour-tabs mkdf-horizontal mkdf-tab-text">
<ul class="mkdf-tabs-nav clearfix">
    <?php foreach($tour_sections as $section) {

        if($section['value'] === 'yes') { ?>

            <li class="mkdf-tour-nav-item">

                <a href="<?php echo esc_attr($section['id']) ?>">

                    <span class="mkdf-tour-nav-section-icon <?php echo esc_attr($section['icon']) ?>"></span>

                    <span class="mkdf-tour-nav-section-title">
							<?php echo esc_html($section['title']) ?>
						</span>

                </a>
            </li>

        <?php }

    }; ?>
</ul>
</div>
<div class="mkdf-grid-row-medium-gutter">
    <div class="mkdf-grid-col-10">
        <article class="mkdf-tour-item-wrapper">

            <?php if($show_info_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_info_section['id']) ?>">

                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/title'); ?>
                    <div class="mkdf-tour-item-short-info">
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/years'); ?>
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/destination'); ?>
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/categories'); ?>
                    </div>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/content'); ?>
                    <?php echo mkdf_core_list_review_details('simple-overall'); ?>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/main-info'); ?>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/gallery'); ?>

                </div>

            <?php } ?>

            <?php if($show_tour_plan_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_tour_plan_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-plan-parts/plan'); ?>
                </div>

            <?php } ?>

            <?php if($show_location_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_location_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-location-parts/location'); ?>
                </div>

            <?php } ?>

            <?php if($show_gallery_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_gallery_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-gallery-parts/gallery'); ?>
                </div>

            <?php } ?>

            <?php if($show_review_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_review_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-review-parts/reviews'); ?>
                </div>

            <?php } ?>

            <?php if($show_custom_section_1['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_custom_section_1['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-custom1-parts/custom'); ?>
                </div>

            <?php } ?>

            <?php if($show_custom_section_2['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_custom_section_2['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-custom2-parts/custom'); ?>
                </div>

            <?php } ?>


        </article>
    </div>
    <div class="mkdf-grid-col-2">
        <aside class="mkdf-sidebar">

            <div class="widget mkdf-tours-booking-form-holder">
                <?php if(mkdf_tours_is_tour_bookable()) : ?>
                    <?php echo mkdf_tours_get_tour_module_template_part('single/booking-form', 'tours', 'templates', '', $params); ?>
                <?php endif; ?>
            </div>
            <div class="mkdf-tours-search-main-filters-holder mkdf-boxed-widget">
                <form action="<?php echo esc_url(mkdf_tours_get_search_page_url()); ?>" method="GET">
                    <div class="mkdf-tours-search-main-filters-title">
                        <h4><?php esc_html_e('Find Your Destination', 'mkdf-tours'); ?></h4>
                    </div>

                    <input type="hidden" name="order_by" value="<?php echo esc_attr(mkdf_tours_search()->getOrderBy()); ?>">
                    <input type="hidden" name="order_type" value="<?php echo esc_attr(mkdf_tours_search()->getOrderType()); ?>">
                    <input type="hidden" name="view_type" value="<?php echo esc_attr(mkdf_tours_search()->getViewType()); ?>">
                    <input type="hidden" name="page" value="<?php echo esc_attr($current_page); ?>">

                    <div class="mkdf-tours-search-main-filters-fields">
                        <div class="mkdf-tours-input-with-icon">
                            <span class="mkdf-tours-input-icon">
                                <span class="icon_search"></span>
                            </span>
                            <input class="mkdf-tours-keyword-search" value="<?php echo esc_attr($keyword); ?>" type="text" name="keyword" placeholder="<?php esc_attr_e('Search Tour', 'mkdf-tours'); ?>">
                        </div>
                        <div class="mkdf-tours-input-with-icon">
                            <span class="mkdf-tours-input-icon mkdf-tours-location-icon">
                                <span class="ion-ios-location"></span>
                            </span>
                            <input type="text" value="<?php echo esc_attr($destination); ?>" class="mkdf-tours-destination-search" name="destination" placeholder="<?php esc_attr_e('Where To?', 'mkdf-tours'); ?>">
                        </div>
                        <div class="mkdf-tours-input-with-icon">
                            <span class="mkdf-tours-input-icon">
                                <span class="ion-calendar"></span>
                            </span>
                            <select name="month" class="mkdf-tours-select-placeholder">
                                <?php foreach($months as $month_value => $month_label) : ?>
                                    <?php $selected = $month_value === (int) $chosen_month ? 'selected' : ''; ?>

                                    <option <?php echo esc_attr($selected); ?> value="<?php echo esc_attr($month_value); ?>"><?php echo esc_html($month_label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mkdf-tours-range-input"></div>

                        <div class="mkdf-tours-input-with-icon mkdf-tours-range-slider">
                            <input type="text" class="mkdf-tours-price-range-field"
                                data-currency-symbol-position="<?php echo esc_attr($currency_position); ?>"
                                data-currency-symbol="<?php echo esc_attr($currency_symbol); ?>"
                                data-min-price="<?php echo esc_attr($min_price); ?>"
                                data-max-price="<?php echo esc_attr($max_price); ?>"
                                data-chosen-min-price="<?php echo esc_attr($chosen_min_price); ?>"
                                data-chosen-max-price="<?php echo esc_attr($chosen_max_price); ?>"
                                placeholder="<?php esc_attr_e('Price Range', 'mkdf-tours'); ?>">
                            <input type="hidden" name="min_price">
                            <input type="hidden" name="max_price">
                        </div>


                        <?php if(is_array($tour_types) && count($tour_types) && $show_tour_types) : ?>
                            <?php foreach($tour_types as $type) : ?>
                                <?php
                                $checked = in_array($type->slug, $checked_types);
                                $checked_attr = $checked ? 'checked' : '';
                                ?>

                                <div class="mkdf-tours-type-filter-item">
                                    <input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="mkdf-tour-type-filter-<?php echo esc_attr($type->slug); ?>" name="type[]" value="<?php echo esc_attr($type->slug); ?>">
                                    <label for="mkdf-tour-type-filter-<?php echo esc_attr($type->slug); ?>">
                                    <span>
                                        <?php echo esc_html($type->name); ?>
                                    </span>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if(mkdf_tours_theme_installed()) : ?>
                            <?php echo wanderers_mkdf_execute_shortcode('mkdf_button', array(
                                'html_type'    => 'input',
                                'input_name'   => 'mkdf_tours_search_submit',
                                'size'         => 'medium',
                                'text'         => esc_attr__('Search', 'mkdf-tours'),
                                'custom_attrs' => array(
                                    'data-searching-label' => esc_attr__('Searching...', 'mkdf-tours')
                                )
                            )); ?>
                        <?php else: ?>
                            <input type="submit" name="mkdf_tours_search_submit" value="<?php esc_attr_e('Search', 'mkdf-tours') ?>" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" data-searching-label="<?php esc_attr_e('Searching...', 'mkdf-tours'); ?>">
                        <?php endif; ?>
                        
                        <?php if(mkdf_tours_is_wpml_installed()) { ?>
                            <?php
                                $lang = ICL_LANGUAGE_CODE;
                            ?>
                            <input type="hidden" name="lang" value="<?php echo esc_attr($lang); ?>">
                        <?php } ?>
                    </div>
                </form>
            </div>
		        <?php
		        if(wanderers_mkdf_get_sidebar() !== 'sidebar') {
			        dynamic_sidebar( wanderers_mkdf_get_sidebar() );
		        } else {
			        dynamic_sidebar('tour-single-sidebar');
		        }
		        ?>
        </aside>
    </div>
</div>


