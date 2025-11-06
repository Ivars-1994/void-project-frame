<?php 
add_action( 'elementor/element/section/section_structure/after_section_end', 'fixera_add_custom_section_controls' ); 
add_action( 'elementor/element/column/layout/after_section_end', 'fixera_add_custom_columns_controls' ); 
function fixera_add_custom_section_controls( \Elementor\Element_Base $element) {
	 
	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Fixera Settings', 'fixera' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
 
	$element->add_control(
		'header_layout_type',
		[
			'label'   => esc_html__( 'Header Layout Type', 'fixera' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'fixera' ),
                'clip'   => esc_html__( 'Clip', 'fixera' ),
            ),
            'prefix_class' => 'pxl-type-header-',
            'default'      => 'none',
		]
	);

	$element->add_control(
	    'pxl_section_offset',
	    [
	      'label' => esc_html__( 'Section Offset', 'fixera' ),
	      'type'         => \Elementor\Controls_Manager::SELECT,
	            'prefix_class' => 'pxl-section-offset-',
	            'hide_in_inner' => true,
	            'options'      => array(
	                'none'    => esc_html__( 'None', 'fixera' ),
	                'left'   => esc_html__( 'Left', 'fixera' ),
	                'right'     => esc_html__( 'Right', 'fixera' ),
	            ),
	            'default'      => 'none',
	            'condition' => [
	                'layout' => 'full_width'
	            ]
	    ]
	  );
	   
	  $element->add_control(
	    'pxl_container_width',
	    [
	            'label' => esc_html__( 'Container Width', 'fixera' ),
	            'type'         => \Elementor\Controls_Manager::SELECT,
	            'prefix_class' => 'pxl-container-width-',
	            'hide_in_inner' => true,
	            'options'      => array(
	                'container-1200'    => esc_html__( '1750px', 'fixera' )
	            ),
	            'default'      => 'container-1200',
	            'condition' => [
	                'layout' => 'full_width',
	                'pxl_section_offset!' => 'none'
	            ]        
	    ]
	);

	$element->add_control(
		'row_scroll_fixed',
		[
	        'label'   => esc_html__( 'Row Scroll - Column Fixed', 'fixera' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'fixera' ),
                'fixed'   => esc_html__( 'Yes', 'fixera' ),
            ),
            'prefix_class' => 'pxl-row-scroll-',
            'default'      => 'none',      
		]
	);
    /* Start Background Image Paralax */
    $element->add_control(
        'pxl_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'fixera' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );

    $element->add_responsive_control(
        'pxl_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'fixera' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'fixera' ),
                'center center' => esc_html__( 'Center Center', 'fixera' ),
                'center left'   => esc_html__( 'Center Left', 'fixera' ),
                'center right'  => esc_html__( 'Center Right', 'fixera' ),
                'top center'    => esc_html__( 'Top Center', 'fixera' ),
                'top left'      => esc_html__( 'Top Left', 'fixera' ),
                'top right'     => esc_html__( 'Top Right', 'fixera' ),
                'bottom center' => esc_html__( 'Bottom Center', 'fixera' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'fixera' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'fixera' ),
                'initial'       =>  esc_html__( 'Custom', 'fixera' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
     
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_bg_pos_custom_y.SIZE}}{{pxl_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{pxl_parallax_bg_pos_custom_x.SIZE}}{{pxl_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'fixera' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'fixera' ),
                'auto' => esc_html__( 'Auto', 'fixera' ),
                'cover'   => esc_html__( 'Cover', 'fixera' ),
                'contain'  => esc_html__( 'Contain', 'fixera' ),
                'initial'    => esc_html__( 'Custom', 'fixera' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_parallax_bg_size' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'fixera' ),
            'label_on' => esc_html__( 'Custom', 'fixera' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_responsive_control(
            'pxl_parallax_pos_left',
            [
                'label' => esc_html__( 'Left', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_top',
            [
                'label' => esc_html__( 'Top', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_parallax_pos_right',
            [
                'label' => esc_html__( 'Right', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
    $element->end_popover();

    $element->add_control(
        'pxl_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'fixera' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'fixera' ),
            'label_on' => esc_html__( 'Custom', 'fixera' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_control(
            'pxl_parallax_bg_img_effect_x',
            [
                'label' => esc_html__( 'TranslateX', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_y',
            [
                'label' => esc_html__( 'TranslateY', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_z',
            [
                'label' => esc_html__( 'TranslateZ', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_x',
            [
                'label' => esc_html__( 'Rotate X', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_x',
            [
                'label' => esc_html__( 'Scale X', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_y',
            [
                'label' => esc_html__( 'Scale Y', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_z',
            [
                'label' => esc_html__( 'Scale Z', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale',
            [
                'label' => esc_html__( 'Scale', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_from_scroll_custom',
            [
                'label' => esc_html__( 'Scroll From (px)', 'fixera' ).' (350) from offset top',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_section_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-section-bg-parallax',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_section_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );

    /* End background paralax */
	  
	$element->end_controls_section();
};

function fixera_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'Fixera Settings', 'fixera' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

    $element->add_responsive_control(
    'pxl_col_auto',
        [
                'label'   => esc_html__( 'Element Auto Width', 'fixera' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'default'           => esc_html__( 'Default', 'fixera' ),
                    'auto'   => esc_html__( 'Auto', 'fixera' ),
                    'grow'   => esc_html__( 'Grow', 'fixera' ),
                    'full'   => esc_html__( 'Full', 'fixera' ),
                ),
                'label_block'  => true, 
                'default'      => 'default',
                'prefix_class' => 'pxl-column-element%s-',
        ]
    );

	$element->add_control(
		'col_content_align',
		[
            'label'   => esc_html__( 'Column Content Align', 'fixera' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''           => esc_html__( 'Default', 'fixera' ),
                'start'           => esc_html__( 'Start', 'fixera' ),
                'center'           => esc_html__( 'Center', 'fixera' ),
                'end'           => esc_html__( 'End', 'fixera' ),
            ),
            'default' => '',
            'prefix_class' => 'pxl-col-align-'
		]
	);
	$element->add_control(
		'col_sticky',
		[
            'label'   => esc_html__( 'Column Sticky', 'fixera' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'           => esc_html__( 'No', 'fixera' ),
				'sticky' => esc_html__( 'Yes', 'fixera' ),
            ),
            'default' => 'none',
            'prefix_class' => 'pxl-column-'
		]
	);

    /* Start Parallax Background Column Image  */
    $element->add_control(
        'pxl_column_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'fixera' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'fixera' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'fixera' ),
                'center center' => esc_html__( 'Center Center', 'fixera' ),
                'center left'   => esc_html__( 'Center Left', 'fixera' ),
                'center right'  => esc_html__( 'Center Right', 'fixera' ),
                'top center'    => esc_html__( 'Top Center', 'fixera' ),
                'top left'      => esc_html__( 'Top Left', 'fixera' ),
                'top right'     => esc_html__( 'Top Right', 'fixera' ),
                'bottom center' => esc_html__( 'Bottom Center', 'fixera' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'fixera' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'fixera' ),
                'initial'       =>  esc_html__( 'Custom', 'fixera' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
     
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_column_parallax_bg_pos_custom_y.SIZE}}{{pxl_column_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{pxl_column_parallax_bg_pos_custom_x.SIZE}}{{pxl_column_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'fixera' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'fixera' ),
                'auto' => esc_html__( 'Auto', 'fixera' ),
                'cover'   => esc_html__( 'Cover', 'fixera' ),
                'contain'  => esc_html__( 'Contain', 'fixera' ),
                'initial'    => esc_html__( 'Custom', 'fixera' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_column_parallax_bg_size' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_column_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'fixera' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'fixera' ),
            'label_on' => esc_html__( 'Custom', 'fixera' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_responsive_control(
            'pxl_column_parallax_pos_left',
            [
                'label' => esc_html__( 'Left', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_column_parallax_pos_top',
            [
                'label' => esc_html__( 'Top', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_column_parallax_pos_right',
            [
                'label' => esc_html__( 'Right', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_column_parallax_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'fixera' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
    $element->end_popover();

    $element->add_control(
        'pxl_column_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'fixera' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'fixera' ),
            'label_on' => esc_html__( 'Custom', 'fixera' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_x',
            [
                'label' => esc_html__( 'TranslateX', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_y',
            [
                'label' => esc_html__( 'TranslateY', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_z',
            [
                'label' => esc_html__( 'TranslateZ', 'fixera' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_x',
            [
                'label' => esc_html__( 'Rotate X', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z', 'fixera' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_x',
            [
                'label' => esc_html__( 'Scale X', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_y',
            [
                'label' => esc_html__( 'Scale Y', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_z',
            [
                'label' => esc_html__( 'Scale Z', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale',
            [
                'label' => esc_html__( 'Scale', 'fixera' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_from_scroll_custom',
            [
                'label' => esc_html__( 'Scroll From (px)', 'fixera' ).' (350) from offset top',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_column_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-column-bg-parallax',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'fixera' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );

    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'fixera'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'fixera' ),
            'label_off' => esc_html__( 'No', 'fixera' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );
    /* End Background Column Image Parallax */
	$element->end_controls_section();
}
add_filter( 'pxl_section_start_render', 'fixera_custom_section_start_render', 10, 3 );
function fixera_custom_section_start_render($html, $settings, $el){  
    if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_parallax_bg_from_scroll_custom'];
        }
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-section-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }   
    return $html;
}
add_filter( 'pxl-custom-section/before-render', 'fixera_custom_section_before_render', 10, 3 );
function fixera_custom_section_before_render($html, $settings, $el){  
    if( isset($settings['pxl_section_border_animated']) && $settings['pxl_section_border_animated'] == 'yes' ){
        $unit = $settings['border_width']['unit'];
        $border_num = 0;
        $bd_top_style = 'style="border-width: '.$settings['border_width']['top'].$unit.' 0 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_right_style = 'style="border-width: 0 '.$settings['border_width']['right'].$unit.' 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_bottom_style = 'style="border-width: 0 0 '.$settings['border_width']['bottom'].$unit.' 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_left_style = 'style="border-width: 0 0 0 '.$settings['border_width']['left'].$unit.'; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';

        if( (int)$settings['border_width']['top'] > 0) $border_num++;
        if( (int)$settings['border_width']['right'] > 0) $border_num++;
        if( (int)$settings['border_width']['bottom'] > 0) $border_num++;
        if( (int)$settings['border_width']['left'] > 0) $border_num++;
        
        $html = '<div class="pxl-border-animated num-'.$border_num.'">
        <div class="pxl-border-anm bt w-100" '.$bd_top_style.'></div>
        <div class="pxl-border-anm br h-100" '.$bd_right_style.'></div>
        <div class="pxl-border-anm bb w-100" '.$bd_bottom_style.'></div>
        <div class="pxl-border-anm bl h-100" '.$bd_left_style.'></div>
        </div>';
    }
    
    return $html;
}

add_action( 'elementor/element/after_add_attributes', 'fixera_custom_el_attributes', 10, 1 );
function fixera_custom_el_attributes($el){
    if( 'section' !== $el->get_name() ) {
        return;
    }
    $settings = $el->get_settings();

    $_animation = ! empty( $settings['_animation'] );
    $animation = ! empty( $settings['animation'] );
    $has_animation = $_animation && 'none' !== $settings['_animation'] || $animation && 'none' !== $settings['animation'];

    if ( $has_animation ) {
        $is_static_render_mode = \Elementor\Plugin::$instance->frontend->is_static_render_mode();

        if ( ! $is_static_render_mode ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-elementor-animate' );
        }
    }
}

add_filter( 'pxl-custom-column/before-render', 'fixera_custom_column_before_render', 10, 3 );
function fixera_custom_column_before_render($html, $settings, $el){
    if(!empty($settings['pxl_column_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_column_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_column_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_column_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_column_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_column_parallax_bg_from_scroll_custom'];
        }
         
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-column-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }
    return $html;
}