<?php

if ( ! function_exists( 'wanderers_mkdf_get_title_types_meta_boxes' ) ) {
	function wanderers_mkdf_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'wanderers_mkdf_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'wanderers' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'wanderers_mkdf_map_title_meta' ) ) {
	function wanderers_mkdf_map_title_meta() {
		$title_type_meta_boxes = wanderers_mkdf_get_title_types_meta_boxes();
		
		$title_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'wanderers' ),
				'name'  => 'title_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'wanderers' ),
				'parent'        => $title_meta_box,
				'options'       => wanderers_mkdf_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'wanderers' ),
						'description'   => esc_html__( 'Choose title type', 'wanderers' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'wanderers' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'wanderers' ),
						'options'       => wanderers_mkdf_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'wanderers' ),
						'description' => esc_html__( 'Set a height for Title Area', 'wanderers' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'wanderers' ),
						'description' => esc_html__( 'Choose a background color for title area', 'wanderers' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'wanderers' ),
						'description' => esc_html__( 'Choose an Image for title area', 'wanderers' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'wanderers' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'wanderers' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'wanderers' ),
							'hide'                => esc_html__( 'Hide Image', 'wanderers' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'wanderers' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'wanderers' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'wanderers' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'wanderers' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'wanderers' )
						)
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'wanderers' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'wanderers' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'wanderers' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'wanderers' ),
							'window-top'    => esc_html__( 'From Window Top', 'wanderers' )
						)
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'wanderers' ),
						'options'       => wanderers_mkdf_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'wanderers' ),
						'description' => esc_html__( 'Choose a color for title text', 'wanderers' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'wanderers' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'wanderers' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'wanderers' ),
						'options'       => wanderers_mkdf_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'wanderers' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'wanderers' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'wanderers_mkdf_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_title_meta', 60 );
}