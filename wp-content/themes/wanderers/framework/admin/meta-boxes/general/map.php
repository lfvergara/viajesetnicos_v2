<?php

if ( ! function_exists( 'wanderers_mkdf_map_general_meta' ) ) {
	function wanderers_mkdf_map_general_meta() {
		
		$general_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'wanderers' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'wanderers' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'wanderers' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'wanderers' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = wanderers_mkdf_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'wanderers' ),
				'description' => esc_html__( 'Define styles for Content area', 'wanderers' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = wanderers_mkdf_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'wanderers' ),
						'parent' => $mkdf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'wanderers' ),
						'parent'  => $mkdf_content_padding_row,
						'options' => wanderers_mkdf_get_yes_no_select_array( false )
					)
				);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'wanderers' ),
				'description' => esc_html__( 'Choose background color for page content', 'wanderers' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'wanderers' ),
				'parent'  => $general_meta_box,
				'options' => wanderers_mkdf_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'wanderers' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'wanderers' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'wanderers' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'wanderers' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'wanderers' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'wanderers' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'wanderers' ),
						'description'   => esc_html__( 'Choose background image attachment', 'wanderers' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'wanderers' ),
							'fixed'  => esc_html__( 'Fixed', 'wanderers' ),
							'scroll' => esc_html__( 'Scroll', 'wanderers' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'wanderers' ),
				'parent'        => $general_meta_box,
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'wanderers' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'wanderers' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'wanderers' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'wanderers' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'wanderers' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'wanderers' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				wanderers_mkdf_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'wanderers' ),
						'options'       => wanderers_mkdf_get_yes_no_select_array(),
					)
				);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'wanderers' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'wanderers' ),
						'options'       => wanderers_mkdf_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'wanderers' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'wanderers' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'wanderers' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'wanderers' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'wanderers' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'wanderers' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'wanderers' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'wanderers' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'wanderers' ),
				'parent'        => $general_meta_box,
				'options'       => wanderers_mkdf_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				wanderers_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'wanderers' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'wanderers' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => wanderers_mkdf_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = wanderers_mkdf_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					wanderers_mkdf_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'wanderers' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = wanderers_mkdf_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'wanderers' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'wanderers' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = wanderers_mkdf_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					wanderers_mkdf_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'wanderers' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'wanderers' ),
								'wanderer_loader'       => esc_html__( 'Wanderer Loader', 'wanderers' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'wanderers' ),
								'pulse'                 => esc_html__( 'Pulse', 'wanderers' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'wanderers' ),
								'cube'                  => esc_html__( 'Cube', 'wanderers' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'wanderers' ),
								'stripes'               => esc_html__( 'Stripes', 'wanderers' ),
								'wave'                  => esc_html__( 'Wave', 'wanderers' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'wanderers' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'wanderers' ),
								'atom'                  => esc_html__( 'Atom', 'wanderers' ),
								'clock'                 => esc_html__( 'Clock', 'wanderers' ),
								'mitosis'               => esc_html__( 'Mitosis', 'wanderers' ),
								'lines'                 => esc_html__( 'Lines', 'wanderers' ),
								'fussion'               => esc_html__( 'Fussion', 'wanderers' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'wanderers' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'wanderers' )
							)
						)
					);
					
					wanderers_mkdf_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'wanderers' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);

					wanderers_mkdf_create_meta_box_field(
			            array(
			                'type' => 'textarea',
			                'name' => 'mkdf_smooth_pt_svg_meta',
			                'parent' => $page_transitions_container_meta,
			                'label' => esc_html__( 'Spinner SVG Code', 'wanderers' ),
			                'dependency' => array(
			                    'show' => array(
			                        'mkdf_smooth_pt_spinner_type_meta' => 'wanderer_loader'
			                    )
			                )
			            )
			        );
					
					wanderers_mkdf_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'wanderers' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'wanderers' ),
							'options'     => wanderers_mkdf_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'wanderers' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'wanderers' ),
				'parent'      => $general_meta_box,
				'options'     => wanderers_mkdf_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/

        if(function_exists('mkdf_tours_activation')){
            wanderers_mkdf_create_meta_box_field(
                array(
                    'name'        => 'mkdf_tours_search_default_view_type_meta',
                    'type'        => 'select',
                    'label'       => esc_html__( 'Tour Search Page Layout', 'wanderers' ),
                    'description' => esc_html__( 'This option will only take effect if the tour search template is selected', 'wanderers' ),
                    'parent'      => $general_meta_box,
                    'options'       => array(
                        ''         => esc_html__('Default', 'wanderers'),
                        'list'     => esc_html__('List', 'wanderers'),
                        'standard' => esc_html__('Standard', 'wanderers'),
                        'gallery'  => esc_html__('Gallery', 'wanderers')
                    ),
                )
            );
        }
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_general_meta', 10 );
}