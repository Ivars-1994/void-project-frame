<?php
$pt_supports = ['post', 'service', 'case'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('Post Carousel Pxl', 'fixera' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'fixera' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'fixera' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => fixera_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        fixera_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'fixera' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'fixera' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'fixera' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        fixera_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        fixera_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'fixera' ),
                                    'ID' => esc_html__('ID', 'fixera' ),
                                    'author' => esc_html__('Author', 'fixera' ),
                                    'title' => esc_html__('Title', 'fixera' ),
                                    'rand' => esc_html__('Random', 'fixera' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'fixera' ),
                                    'asc' => esc_html__('Ascending', 'fixera' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Fixera Animate', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => fixera_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'arrows_position',
                            'label' => esc_html__('Arrows Position', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'arrows-bottom',
                            'options' => [
                                'arrows-top' => 'Top',
                                'arrows-middle' => 'Middle',
                                'arrows-bottom' => 'Bottom',
                            ],
                            'condition' => [
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'content_align_arrows',
                            'label' => esc_html__('Arrows align', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'fixera' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'fixera' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'fixera' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .grap-arrows' => 'justify-content: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows_position' => ['arrows-top', 'arrows-bottom'],
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'display_arrow',
                            'label' => esc_html__('Hidden Arrows', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'arrows-show',
                            'options' => [
                                'arrows-show'   => 'Show',
                                'arrows-hidden' => 'Hidden',
                            ],
                            'condition' => [
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'content_align_bullets',
                            'label' => esc_html__('Bullets align', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'fixera' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'fixera' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'fixera' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots' => 'justify-content: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'fixera'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'fixera'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'show_comment',
                            'label' => esc_html__('Show Comment', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => 'post-1',
                            ],
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2', 'service-3' ]]
                                        ]
                                    ]
                                ],
                            ]
                        ),

                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1', 'post-2']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__('Show Author', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => 'post-1',
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Readmore Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true'],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ],
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2', 'service-3']]
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'separator' => 'after',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2', 'service-3']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Icon', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                ]
                            ],
                        ],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--icon a i, {{WRAPPER}} .pxl-item--icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_color',
                            'label' => esc_html__('Background Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'label' => esc_html__( 'Icon Box Shadow', 'fixera' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-item--inner .pxl-item--icon',
                        ),
                        array(
                            'name' => 'icon_color_hv',
                            'label' => esc_html__('Icon Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--icon:hover a i, {{WRAPPER}} .pxl-item--icon:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_hv',
                            'label' => esc_html__('Background Icon Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner:hover .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),  
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Title', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'post_title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'post_title_color_hv',
                            'label' => esc_html__('Title Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--title a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-item--inner:hover .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'post_title_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--inner .pxl-item--title',
                        ),
                    ),  
                ),
                array(
                    'name' => 'tab_style_meta',
                    'label' => esc_html__('Meta', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'date_color',
                            'label' => esc_html__('Date Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .item--date' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1'],
                            ],
                        ),
                        array(
                            'name' => 'bg_date_color',
                            'label' => esc_html__('Background Date', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .item--date' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1'],
                            ],
                        ),
                        array(
                            'name' => 'post_comment_color',
                            'label' => esc_html__('Comment Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-meta-bottom .item--comment a' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1'],
                            ],
                        ),
                        array(
                            'name' => 'post_comment_color_hv',
                            'label' => esc_html__('Comment Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-meta-bottom .item--comment a:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1'],
                            ],
                        ),
                        array(
                            'name' => 'dottesd_color',
                            'label' => esc_html__('Dottesd Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--meta li::after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1', 'post-2'],
                            ],
                        ),
                        array(
                            'name' => 'check_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-row-info li i' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['service'],
                                'layout_service' => ['service-1'],
                            ],
                        ),
                        array(
                            'name' => 'check_color_bg',
                            'label' => esc_html__('Icon Color Background', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-row-info li i' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['service'],
                                'layout_service' => ['service-1'],
                            ],
                        ),
                        array(
                            'name' => 'bg_box_icon',
                            'label' => esc_html__('Icon Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--icon:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['service'],
                                'layout_service' => ['service-2'],
                            ],
                        ),
                    ),  
                ),
                array(
                    'name' => 'tab_style_excerpt',
                    'label' => esc_html__('Excerpt', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'post_excerpt_color',
                            'label' => esc_html__('Excerpt Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1', 'post-2'],
                            ],
                        ),
                        array(
                            'name' => 'excerpt_title_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--inner .pxl-item--content',
                        ),
                    ),  
                ), 
                array(
                    'name' => 'tab_style_button',
                    'label' => esc_html__('Button', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1', 'post-2']],
                                    ['name' => 'show_button', 'operator' => '==', 'value' => 'true'],
                                ]
                            ],
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                ]
                            ]
                        ],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Button Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .btn-showmore' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_color_hover',
                            'label' => esc_html__('Button Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .btn-showmore:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-item--inner:hover .btn-showmore' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),  
                ),  
                array(
                    'name' => 'tab_style_general',
                    'label' => esc_html__('General', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_box',
                            'label' => esc_html__('Item Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-style1' => 'Style1',
                                'item-style2' => 'Style2',
                                'item-style3' => 'Style3',
                            ],
                            'default' => 'item-style1',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'style_box_case',
                            'label' => esc_html__('Item Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-style1' => 'Style1',
                                'item-style2' => 'Style2',
                            ],
                            'default' => 'item-style1',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-2']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'post_item_border',
                            'label' => esc_html__('Item Border Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-meta-bottom' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['post'],
                                'layout_post' => ['post-1'],
                            ],
                        ),
                        array(
                            'name' => 'bg_item_color',
                            'label' => esc_html__('Background Item Holder', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bg-image::before' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                            ['name' => 'style_box', 'operator' => 'in', 'value' => ['item-style1', 'item-style2']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'bg_box_item',
                            'label' => esc_html__('Background Item Holder', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--holder' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                            ['name' => 'style_box', 'operator' => 'in', 'value' => ['item-style3']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'bg_box_item3',
                            'label' => esc_html__('Background Item Holder', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner:hover .pxl-item-body' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name'         => 'item_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'fixera' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-item--inner .pxl-item--holder',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);