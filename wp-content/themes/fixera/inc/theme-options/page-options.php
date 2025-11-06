<?php
add_action( 'pxl_post_metabox_register', 'fixera_page_options_register' );
function fixera_page_options_register( $metabox ) {
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Post Header', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        fixera_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'post_title' => [
					'title'  => esc_html__( 'Post Title', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        fixera_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'post_format_setting' => [
					'title'  => esc_html__( 'Post Format Settings', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array(
                        array(
                            'id'          => 'featured-video-url',
                            'type'        => 'text',
                            'title'       => esc_html__( 'Video URL', 'fixera' ),
                            'description' => esc_html__( 'Video will show when set post format is video', 'fixera' ),
                            'validate'    => 'url',
                            'msg'         => 'Url error!',
                        ),
                        array(
                            'id'          => 'featured-audio-url',
                            'type'        => 'text',
                            'title'       => esc_html__( 'Audio URL', 'fixera' ),
                            'description' => esc_html__( 'Audio that will show when set post format is audio', 'fixera' ),
                            'validate'    => 'url',
                            'msg'         => 'Url error!',
                        ),
                        array(
							'id'       => 'featured-gallery',
							'type'     => 'gallery',
							'title'    => esc_html__( 'Gallery Images ', 'fixera' ),
							'subtitle' => esc_html__( 'Upload images or add from media library.', 'fixera' )
						),
                        array(
							'id'      =>'featured-quote-text',
							'type'    => 'textarea',
							'title'   => esc_html__('Quote Text', 'fixera'),
							'default' => '',
                        ),
                        array(
                            'id'          => 'featured-quote-cite',
                            'type'        => 'text',
                            'title'       => esc_html__( 'Quote Cite', 'fixera' ),
                            'description' => esc_html__( 'Quote will show when set post format is quote', 'fixera' ),
                        ),
                        array(
							'id'          => 'featured-link-url',
							'type'        => 'text',
							'title'       => esc_html__( 'Format Link URL', 'fixera' ),
							'description' => esc_html__( 'Link will show when set post format is link', 'fixera' ),
                        ),
                        array(
                            'id'          => 'featured-link-text',
                            'type'        => 'text',
                            'title'       => esc_html__( 'Format Link Text', 'fixera' ),
                        ), 
					)
				],
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'fixera' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						fixera_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
					        array(
					            'id'       => 'post_feature_image_on',
					            'title'    => esc_html__('Feature Image', 'fixera'),
					            'subtitle' => esc_html__('Show feature image on single post.', 'fixera'),
					            'type'     => 'switch',
					            'default'  => true,
					        ),
						),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'fixera' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Settings', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
		                  	array(
		                        'id'       => 'disable_header',
		                        'title'    => esc_html__('Disable', 'fixera'),
		                        'type'     => 'switch',
		                        'default'  => '0',
		                    ),
		              	),
				        fixera_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'fixera' ),
				                'options'  => fixera_get_nav_menu_slug(),
				                'default' => '',
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'fixera'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'fixera'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'fixera'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'fixera'),
				                ),
				                'default'  => '-1',
				            ),
				        )
				    )
				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        fixera_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'fixera' ),
				                'options'  => fixera_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        fixera_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'fixera' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						fixera_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'fixera' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
					        	'id'           => 'loading_page',
					        	'type'         => 'button_set',
					        	'title'        => esc_html__( 'Loading', 'fixera' ),
					        	'options'      => array(
					        		'-1'  	   => esc_html__( 'Inherit', 'fixera' ),
					        		'bd' 	   => esc_html__( 'Builder', 'fixera' ),
					        	),
					        	'default'      => '-1',
					        ),
					        array(
					        	'id'    => 'loader_style',
					        	'type'  => 'select',
					        	'title' => esc_html__('Loader Style', 'fixera'),
					        	'options' => [
					                'style-text'           => esc_html__('Text(Default)', 'fixera'),
					                'style-experiment'      => esc_html__('Experiment', 'fixera'),
					                'style-business'       => esc_html__('Business', 'fixera'),
					        	],
					        	'default' => 'style-text',
					        	'indent' => true,
					        	'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'bd' ),
					        ),
					        array(
					        	'id'             => 'loading_text',
					        	'type'           => 'text',
					        	'title'          => esc_html__('Loading Text', 'fixera'),
					        	'default'        => '',
					        	'desc'           => esc_html__('Enter the text displayed on load.', 'fixera'),
					        	'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-text' ),
					        	'force_output'   => true
					        ),
					        array(
					            'id'       => 'body_bg_color',
					            'type'     => 'background',
					            'title'    => esc_html__('Body Background Color', 'fixera'),
					            'output'   => array( 'background-color' => 'body' ),
					            'force_output' => true,
					            'background-image' => false,
					            'background-color' => true,
					            'background-position' => false,
					            'background-repeat' => false,
					            'background-size' => false,
					            'background-attachment' => false,
					            'transparent' => false,
					            'default'  => ''
					        ),
					    ),
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'fixera' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
		                  	array(
		                        'id'       => 'disable_footer',
		                        'title'    => esc_html__('Disable', 'fixera'),
		                        'type'     => 'switch',
		                        'default'  => '0',
		                    ),
		              	),
				        fixera_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'fixera'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'fixera'),
				                    'on' => esc_html__('On', 'fixera'),
				                    'off' => esc_html__('Off', 'fixera'),
				                ),
				                'default'  => 'inherit',
				            ),
					        array(
					            'id'       => 'bg_bg_backtotop',
					            'type'     => 'color_rgba',
					            'title'    => esc_html__( 'Back to Top Background Color', 'fixera' ),
					            'output'   => array( 'background-color' => '.pxl-scroll-top.pxl-on' ),
					            'force_output' => true,
					        ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'fixera' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'fixera'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					    )
				    )
				]
			]
		],
		'case' => [
			'opt_name'            => 'pxl_case_options',
			'display_name'        => esc_html__( 'Case Study Options', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'case_header' => [
					'title'  => esc_html__( 'General', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        fixera_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        fixera_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
				    )
				],
				'port_meta' => [
					'title'  => esc_html__( 'Meta', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
					 	array(
				            'id'          => 'client',
				            'type'        => 'text',
				            'title'       => esc_html__('Client', 'fixera'),
				            'default'     => ''
				        ),
					 	array(
				            'id'          => 'location',
				            'type'        => 'text',
				            'title'       => esc_html__('Location', 'fixera'),
				            'default'     => ''
				        ),
				        array(
					        'id'          => 'date_start',
					        'type'        => 'date',
					        'title'       => esc_html__('Date Start', 'fixera')
					    ),
				        array(
					        'id'          => 'date_end',
					        'type'        => 'date',
					        'title'       => esc_html__('Date End', 'fixera')
					    ),
					)
				],
				'case_content' => [
					'title'  => esc_html__( 'Content', 'fixera' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						fixera_sidebar_pos_opts(['prefix' => 'case_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'fixera' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'case_footer' => [
					'title'  => esc_html__( 'Footer', 'fixera' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        fixera_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Settings', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'fixera'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'fixera'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'fixera'),
					                'image'  => esc_html__('Image', 'fixera'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'fixera'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'fixera'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
						)
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        fixera_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
				    )
				],
				'service_content' => [
					'title'  => esc_html__( 'Content', 'fixera' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'fixera' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'service_footer' => [
					'title'  => esc_html__( 'Footer', 'fixera' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        fixera_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'product_header' => [
					'title'  => esc_html__( 'Header', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        fixera_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
				    ),
				],
				'product_title' => [
					'title'  => esc_html__( 'Page Title', 'fixera' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        fixera_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'product_content' => [
					'title'  => esc_html__( 'Content', 'fixera' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						fixera_sidebar_pos_opts(['prefix' => 'product_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'fixera' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'product_footer' => [
					'title'  => esc_html__( 'Footer', 'fixera' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        fixera_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Settings', 'fixera' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'fixera' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'fixera'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'fixera'), 
								'header'       => esc_html__('Header', 'fixera'), 
								'footer'       => esc_html__('Footer', 'fixera'), 
								'mega-menu'    => esc_html__('Mega Menu', 'fixera'), 
								'page-title'   => esc_html__('Page Title', 'fixera'), 
								'tab'          => esc_html__('Tab', 'fixera'),
								'hidden-panel' => esc_html__('Hidden Panel', 'fixera'),
								'slider'       => esc_html__('Slider', 'fixera'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'button_set',
							'title' => esc_html__('Header Type', 'fixera'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'fixera'), 
								'px-header--transparent'       => esc_html__('Transparent', 'fixera'),
								'px-header--left_sidebar'      => esc_html__('Left Sidebar', 'fixera'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),
				        array(
							'id'       => 'template_position',
							'type'     => 'select',
							'title'    => esc_html__('Display Position', 'fixera'),
							'options'  => [
								'left'   => esc_html__('Left Position', 'fixera'),
								'top'    => esc_html__('Top Position', 'fixera'),
								'center' => esc_html__('Center Position (popup)', 'fixera'),
								'right'  => esc_html__('Right Position', 'fixera'),
								'full'   => esc_html__('Full Screen', 'fixera'),
				            ],
							'default'  => 'left',
							'required' => [ 'template_type', '=', 'hidden-panel']
				        ),
				        array(
				            'id'          => 'hidden_panel_width',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Width', 'fixera'),
				            'subtitle'       => esc_html__('Enter number.', 'fixera'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'header_sidebar_width',
				            'type'        => 'slider',
				            'title'       => esc_html__('Header Sidebar Width', 'fixera'),
				            "default"   => 300,
						    "min"       => 50,
						    "step"      => 1,
						    "max"       => 900,
				            'force_output' => true,
				            'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
				        )
					),
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 