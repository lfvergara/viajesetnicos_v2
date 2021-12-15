<div class="mkdf-top-reviews-carousel-holder <?php echo esc_html($skin); ?>">
    <?php if(is_array($reviews) && count($reviews)) : ?>
        <div class="mkdf-top-reviews-carousel-inner">
            <?php if(!empty($title)) { ?>
                <h2 class="mkdf-top-reviews-carousel-title"><?php echo esc_html($title); ?></h2>
            <?php } ?>

            <div class="mkdf-top-reviews-carousel mkdf-owl-slider">
                <?php foreach($reviews as $review) {
                    $params['comment'] = $review;
                    $item_params = $this_shortcode->generateItemParams($params);
                    echo mkdf_core_get_module_shortcode_template_part( 'reviews', 'top-reviews-carousel', 'top-reviews-carousel-item', '', $item_params);
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>